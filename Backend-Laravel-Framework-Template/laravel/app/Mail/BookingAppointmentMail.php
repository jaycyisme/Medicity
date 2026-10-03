<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingAppointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $formattedDateTime;
    /**
     * Create a new message instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->formattedDateTime = $this->formatDateTime();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appointment Confirmation - ' . $this->appointment->appointment_code,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.BookingAppointmentMail',
            with: [
                'appointment' => $this->appointment,
                'formattedDateTime' => $this->formattedDateTime,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function formatDateTime()
    {
        $businessHour = json_decode($this->appointment->business_hour, true);

        // Kiểm tra xem có dữ liệu business hour hay không
        if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
            return 'Not Set';
        }

        // Format ngày và giờ
        $date = Carbon::parse($businessHour['date'])->format('d M, Y');
        $time = $businessHour['time'];

        return "{$date} at {$time}";
    }
}
