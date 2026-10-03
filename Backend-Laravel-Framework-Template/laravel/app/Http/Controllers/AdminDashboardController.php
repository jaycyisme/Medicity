<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function getAppointmentRevenue(Request $request)
    {
        $start = $request->query('start_date');
        $end = $request->query('end_date');

        $query = Appointment::query()
            ->where('status_id', 2); // giả sử 2 là 'completed'

        if ($start && $end) {
            $query->whereBetween('created_at', [$start, $end]);
        }

        $totalRevenue = $query->sum('appointment_final_price');

        // Thống kê theo tháng hiện tại
        $monthlyRevenue = Appointment::selectRaw('MONTH(created_at) as month, SUM(appointment_final_price) as total')
            ->where('status_id', 2)
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $result[] = round($monthlyRevenue[$i] ?? 0, 2);
        }

        return response()->json([
            'totalRevenue' => $totalRevenue,
            'monthlyRevenue' => $result,
        ]);
    }

    public function getOrderRevenue(Request $request)
    {
        $start = $request->query('start_date');
        $end = $request->query('end_date');

        $query = Order::query()->where('order_status_id', 4); // Giả sử 4 là 'completed'

        if ($start && $end) {
            $query->whereBetween('created_at', [$start, $end]);
        }

        $totalRevenue = $query->sum('final_amount');

        $monthlyRevenue = Order::selectRaw('MONTH(created_at) as month, SUM(final_amount) as total')
            ->where('order_status_id', 4)
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $result[] = round($monthlyRevenue[$i] ?? 0, 2);
        }

        return response()->json([
            'totalRevenue' => $totalRevenue,
            'monthlyRevenue' => $result,
        ]);
    }

    public function getTotalRevenueSummary()
    {
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfYear = Carbon::now()->startOfYear();

        // Tổng daily
        $orderDaily = Order::whereDate('created_at', $today)
            ->where('order_status_id', 4)
            ->sum('final_amount');
        $appointmentDaily = Appointment::whereDate('created_at', $today)
            ->where('status_id', 2)
            ->sum('appointment_final_price');

        // Tổng monthly
        $orderMonthly = Order::whereBetween('created_at', [$startOfMonth, now()])
            ->where('order_status_id', 4)
            ->sum('final_amount');
        $appointmentMonthly = Appointment::whereBetween('created_at', [$startOfMonth, now()])
            ->where('status_id', 2)
            ->sum('appointment_final_price');

        // Tổng yearly
        $orderYearly = Order::whereBetween('created_at', [$startOfYear, now()])
            ->where('order_status_id', 4)
            ->sum('final_amount');
        $appointmentYearly = Appointment::whereBetween('created_at', [$startOfYear, now()])
            ->where('status_id', 2)
            ->sum('appointment_final_price');

        return response()->json([
            'daily' => round($orderDaily + $appointmentDaily, 2),
            'monthly' => round($orderMonthly + $appointmentMonthly, 2),
            'yearly' => round($orderYearly + $appointmentYearly, 2),
        ]);
    }

    public function getWeeklyRevenue()
    {
        $revenueByDay = [];

        // Duyệt từ Thứ 2 (1) đến Chủ nhật (7)
        for ($day = 1; $day <= 7; $day++) {
            // Lấy ngày tương ứng trong tuần này
            $date = Carbon::now()->startOfWeek()->addDays($day - 1);

            // Revenue đơn hàng
            $orderRevenue = Order::whereDate('created_at', $date)
                ->where('order_status_id', 4)
                ->sum('final_amount');

            // Revenue lịch hẹn
            $appointmentRevenue = Appointment::whereDate('created_at', $date)
                ->where('status_id', 2)
                ->sum('appointment_final_price');

            // Tổng revenue
            $total = round($orderRevenue + $appointmentRevenue, 2);

            // Map tên ngày: Mon → Sun
            $dayName = $date->format('D'); // eg. "Mon", "Tue", etc.

            $revenueByDay[$dayName] = $total;
        }

        return response()->json($revenueByDay);
    }

    public function getTotalCounts()
    {
        $totalOrders = Order::where('order_status_id', 4)->count();
        $totalAppointments = Appointment::where('status_id', 2)->count();

        return response()->json([
            'orders' => $totalOrders,
            'appointments' => $totalAppointments,
        ]);
    }

    public function getOrderTypeRevenue()
    {
        $year = now()->year;

        // Tổng revenue tất cả order đã hoàn tất
        $totalRevenue = Order::where('order_status_id', 4)->sum('final_amount');

        // Revenue theo loại đơn (Online: 1, In-store: 2)
        $onlineRevenue = Order::where('order_status_id', 4)
            ->where('order_type_id', 1)
            ->sum('final_amount');

        $instoreRevenue = Order::where('order_status_id', 4)
            ->where('order_type_id', 2)
            ->sum('final_amount');

        // Biểu đồ theo tháng (theo từng loại)
        $onlineMonthly = Order::selectRaw('MONTH(created_at) as month, SUM(final_amount) as total')
            ->where('order_status_id', 4)
            ->where('order_type_id', 1)
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month');

        $instoreMonthly = Order::selectRaw('MONTH(created_at) as month, SUM(final_amount) as total')
            ->where('order_status_id', 4)
            ->where('order_type_id', 2)
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Dữ liệu đủ 12 tháng
        $onlineSeries = [];
        $instoreSeries = [];
        for ($i = 1; $i <= 12; $i++) {
            $onlineSeries[] = round($onlineMonthly[$i] ?? 0, 2);
            $instoreSeries[] = round($instoreMonthly[$i] ?? 0, 2);
        }

        return response()->json([
            'total' => round($totalRevenue, 2),
            'online' => round($onlineRevenue, 2),
            'instore' => round($instoreRevenue, 2),
            'monthly' => [
                'online' => $onlineSeries,
                'instore' => $instoreSeries,
            ]
        ]);
    }
}
