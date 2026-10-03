<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\DoctorFavourite;
use App\Models\LaboratoryResult;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        $latestRecord = MedicalRecord::whereHas('appointment', function ($query) use ($userId) {
            $query->where('user_id', $userId)->where('status_id', 2);
        })->latest()->first();

        $user = Auth::user();

        $favouriteDoctors = $user->favouriteDoctors()
            ->take(4)
            ->get();

        $upcomingAppointments = Appointment::with(['doctor'])
            ->where('user_id', Auth::id())
            ->where('status_id', 3)
            ->latest('created_at')
            ->get();

        $appointments = Appointment::with(['doctor', 'service'])
            ->where('user_id', $userId)
            ->where('status_id', 2)
            ->latest('created_at')
            ->get();

        $orders = Order::with(['orderItems.productVariant.product', 'paymentMethod', 'orderStatus'])
            ->where('user_id', $userId)
            ->where('order_status_id', 3)
            ->latest('created_at')
            ->get();

        return view('patient.patient-dashboard', compact('latestRecord', 'favouriteDoctors', 'upcomingAppointments', 'appointments', 'orders'));
    }

    public function getWeeklyRevenueStats()
    {
        $userId = Auth::id();

        $appointmentRevenue = [];
        $orderRevenue = [];

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->startOfWeek()->addDays($i);

            // Doanh thu từ Appointment
            $appointmentRevenue[] = Appointment::where('user_id', $userId)
                ->where('status_id', 2)
                ->whereDate('created_at', $date)
                ->sum('appointment_final_price');

            // Doanh thu từ Order
            $orderRevenue[] = Order::where('user_id', $userId)
                ->where('order_status_id', 3)
                ->whereDate('created_at', $date)
                ->sum('final_amount');
        }

        return response()->json([
            'appointmentRevenue' => $appointmentRevenue,
            'orderRevenue' => $orderRevenue,
        ]);
    }

    public function appointment()
    {
        $upcomingAppointments = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
        ])->where('user_id', Auth::user()->id)
          ->where('status_id', 3)->get();

        $cancelledAppointments = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
        ])->where('user_id', Auth::user()->id)
          ->where('status_id', 4)->get();

        $completedAppointments = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
        ])->where('user_id', Auth::user()->id)
          ->where('status_id', 2)->get();

        return view('patient.appointment.patient-appointment', compact('upcomingAppointments', 'cancelledAppointments', 'completedAppointments'));
    }

    public function upcomingAppointment()
    {
        return view('patient.appointment.patient-upcoming-appointment');
    }

    public function cancelledAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('patient.appointment.patient-cancelled-appointment', compact('appointment'));
    }

    public function completedAppointment($id)
    {
        $appointment = Appointment::with([
            'clinic',
            'user',
            'doctor',
            'service.speciality',
            'appointmentRequestType',
        ])->findOrFail($id);
        $medical_record = MedicalRecord::where('appointment_id', $appointment->id)->first();
        $medications = $medical_record->medications;
        $laboratoryResults = LaboratoryResult::with('laboratoryTest')->where('medical_record_id', $medical_record->id)->get();
        return view('patient.appointment.patient-completed-appointment', compact('appointment', 'medical_record', 'medications', 'laboratoryResults'));
    }

    public function medicalRecord()
    {
        return view('patient.medical-record');
    }

    public function invoice()
    {
        return view('patient.invoice');
    }

    public function favourite()
    {
        return view('patient.favourite');
    }

    public function profileSetting()
    {
        return view('patient.profile-setting');
    }

    public function changePassword()
    {
        return view('patient.change-password');
    }


    public function toggleFavourite(Request $request, $doctorId)
    {
        $favourite = DoctorFavourite::where('patient_id', Auth::user()->id)
                                    ->where('doctor_id', $doctorId)
                                    ->first();

        if ($favourite) {
            $favourite->delete();
        } else {
            DoctorFavourite::create([
                'patient_id' => Auth::user()->id,
                'doctor_id' => $doctorId,
            ]);
        }

        return response()->json(['success' => true]);
    }
}
