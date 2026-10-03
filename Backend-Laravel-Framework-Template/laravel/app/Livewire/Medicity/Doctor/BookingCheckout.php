<?php

namespace App\Livewire\Medicity\Doctor;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Mail\BookingAppointmentMail;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal;

class BookingCheckout extends Component
{
    public $appointment;
    public $doctor;
    public $averageStars;
    public $formattedDateTime;
    public $paymentMethods;
    public $selectedPaymentMethod;


    public $qrCodeUrl;

    public function mount($id) {
        $this->appointment = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
            'speciality'
        ])->findOrFail($id);
        $this->doctor = $this->appointment->doctor;
        $this->averageStars = $this->doctor->doctorFeedbacks->avg('star') ?? 0;
        $this->formattedDateTime = $this->formatDateTime();

        $this->paymentMethods = PaymentMethod::all();
        $this->selectedPaymentMethod = 2;
        if (session()->has('selectedPaymentMethod')) {
            $this->selectedPaymentMethod = session('selectedPaymentMethod');  // Get PayPal as the selected method
        }


        session()->put('appointmentId', $this->appointment->id);

        $bankId = 'VCB';
        $accountNo = '1025314748';
        $template = 'compact2';
        $amount = $this->appointment->appointment_final_price * 25770;
        $description = $this->appointment->appointment_code ?? 'no_code';
        $accountName = 'ĐỖ QUỐC TUẤN';

        $this->qrCodeUrl = "https://img.vietqr.io/image/{$bankId}-{$accountNo}-{$template}.png?amount={$amount}&addInfo={$description}&accountName={$accountName}";
    }

    public function formatDateTime()
    {
        $businessHour = json_decode($this->appointment->business_hour, true);
        if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
            return 'Not Set';
        }

        $date = Carbon::parse($businessHour['date'])->format('d M, Y');
        $time = $businessHour['time'];

        return "{$date} at {$time}";
    }


    public function selectPaymentMethod($paymentMethodId)
    {
        $this->selectedPaymentMethod = $paymentMethodId;

        // Tạo QR Code chỉ khi người dùng chọn Transfer (id = 2)
        if ($paymentMethodId == 2) {
            $bankId = 'VCB';
            $accountNo = '1025314748';
            $template = 'compact2';
            $amount = $this->appointment->appointment_final_price * 25770;
            $description = $this->appointment->appointment_code ?? 'no_code';
            $accountName = 'ĐỖ QUỐC TUẤN';

            $this->qrCodeUrl = "https://img.vietqr.io/image/{$bankId}-{$accountNo}-{$template}.png?amount={$amount}&addInfo={$description}&accountName={$accountName}";
        } else {
            // Nếu không chọn Transfer, xoá QR code
            $this->qrCodeUrl = null;
        }
    }

    public function checkout() {
        $this->appointment->update([
            'status_id' => 5,
            'payment_method_id' => $this->selectedPaymentMethod,
        ]);

        session()->forget(['appointmentId']);

        Mail::to($this->appointment->patient_email)->send(new BookingAppointmentMail($this->appointment));

        return redirect()->route('appointment-confirmation', ['id' => $this->appointment->id]);
    }

    public function paypal()
    {
        $provider = new PayPal;
        $provider->setApiCredentials(config('paypal'));

        $paypalToken = $provider->getAccessToken();

        // Tạo đơn hàng PayPal
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('bookingcheckout.paypalReturn'), // Trả về trang checkout khi thanh toán thành công
                "cancel_url" => route('bookingcheckout.paypalCancel')  // Nếu thanh toán bị huỷ, quay lại trang checkout
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $this->appointment->appointment_final_price
                    ]
                ]
            ]
        ]);

        // Kiểm tra phản hồi từ PayPal
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']); // Redirect đến PayPal để thanh toán
                }
            }
        } else {
            session()->put('selectedPaymentMethod', PaymentMethod::where('name', 'Paypal')->first()->id);
            $this->selectedPaymentMethod = PaymentMethod::where('name', 'Paypal')->first()->id;
            $appointmentId = session()->get('appointmentId');
            return redirect()->route('appointment-checkout', ['id' => $appointmentId])->with('success', 'Payment successful! You can complete the process now.');
        }
    }

    public function paypalReturn(Request $request)
    {
        $provider = new PayPal;
        $provider->setApiCredentials(config('paypal'));

        // Lấy token từ URL query string
        $token = $request->query('token'); // Đảm bảo bạn sử dụng $request->query()

        if (!$token) {
            session()->put('selectedPaymentMethod', PaymentMethod::where('name', 'Paypal')->first()->id);
            $this->selectedPaymentMethod = PaymentMethod::where('name', 'Paypal')->first()->id;
            $appointmentId = session()->get('appointmentId');
            return redirect()->route('appointment-checkout', ['id' => $appointmentId])->with('success', 'Payment successful! You can complete the process now.');
        }

        // Xác nhận thanh toán từ PayPal
        $response = $provider->capturePaymentOrder($token);

        // dd($token);

        // Kiểm tra trạng thái thanh toán
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // // Cập nhật trạng thái đơn hàng trong cơ sở dữ liệu
            // $this->order->update([
            //     'payment_status_id' => 2, // Đã thanh toán
            //     'order_status_id' => 2, // Đơn hàng đã xác nhận
            // ]);

            // // Gửi email xác nhận đơn hàng
            // Mail::to($this->order->customer_email)->send(new OrderMail($this->order));

            // // Xoá giỏ hàng và chuyển hướng đến trang appointment-checkout', ['id' => $this->appointment->id]            // session()->forget(['cart', 'order_id', 'discount']);
            session()->put('selectedPaymentMethod', PaymentMethod::where('name', 'Paypal')->first()->id);
            $this->selectedPaymentMethod = PaymentMethod::where('name', 'Paypal')->first()->id;
            $appointmentId = session()->get('appointmentId');
            return redirect()->route('appointment-checkout', ['id' => $appointmentId])->with('success', 'Payment successful! You can complete the process now.');
        } else {
            // Nếu không thanh toán thành công
            // return redirect()->route('appointment-checkout', ['id' => $this->appointment->id])->with('error', 'Payment failed or invalid response');
            session()->put('selectedPaymentMethod', PaymentMethod::where('name', 'Paypal')->first()->id);
            $this->selectedPaymentMethod = PaymentMethod::where('name', 'Paypal')->first()->id;
            $appointmentId = session()->get('appointmentId');
            return redirect()->route('appointment-checkout', ['id' => $appointmentId])->with('success', 'Payment successful! You can complete the process now.');
        }
    }

    public function paypalCancel()
    {
        session()->put('selectedPaymentMethod', PaymentMethod::where('name', 'Paypal')->first()->id);
        $this->selectedPaymentMethod = PaymentMethod::where('name', 'Paypal')->first()->id;
        $appointmentId = session()->get('appointmentId');
        return redirect()->route('appointment-checkout', ['id' => $appointmentId])->with('error', 'Payment was cancelled');
    }

    public function render()
    {
        return view('livewire.medicity.doctor.booking-checkout');
    }
}
