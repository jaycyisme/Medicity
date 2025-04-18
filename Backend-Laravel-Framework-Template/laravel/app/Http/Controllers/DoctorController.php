<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Chat;
use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    public function dashboard()
    {
        return view('doctor.doctor-dashboard');
    }

    public function request()
    {
        $appointments = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
            'speciality'
        ])->where('doctor_id', Auth::user()->id)
          ->where('status_id', 5)->get();


        return view('doctor.doctor-request', compact('appointments'));
    }

    public function acceptRequest($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status_id' => 3]);

        return redirect()->route('doctor.request')->with('success', 'Appointment accepted successfully.');
    }

    public function declineRequest($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status_id' => 4]);

        return redirect()->route('doctor.request')->with('success', 'Appointment declined successfully.');
    }


    public function appointment()
    {
        $upcomingAppointments = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
        ])->where('doctor_id', Auth::user()->id)
          ->where('status_id', 3)->orderBy('id', 'DESC')->get();

        $cancelledAppointments = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
        ])->where('doctor_id', Auth::user()->id)
          ->where('status_id', 4)->orderBy('id', 'DESC')->get();

        $completedAppointments = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
        ])->where('doctor_id', Auth::user()->id)
          ->where('status_id', 2)->orderBy('id', 'DESC')->get();

        return view('doctor.appointment.doctor-appointment', compact('upcomingAppointments', 'cancelledAppointments', 'completedAppointments'));
    }

    public function upcomingAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('doctor.appointment.doctor-upcoming-appointment', compact('appointment'));
    }

    public function cancelledAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('doctor.appointment.doctor-cancelled-appointment', compact('appointment'));
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
        return view('doctor.appointment.doctor-completed-appointment', compact('appointment', 'medical_record', 'medications'));
    }

    public function appointmentStart($id)
    {
        $appointment = Appointment::findOrFail($id);
        $medical_record = MedicalRecord::where('appointment_id', $appointment->id)->first();

        // Decode business_hour JSON
        $businessHour = json_decode($appointment->business_hour, true);

        if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
            $sessionEndTime = null;
        } else {
            $startDateTime = Carbon::parse("{$businessHour['date']} {$businessHour['time']}");
            $sessionEndTime = $startDateTime->addMinutes($appointment->service->duration);
        }

        return view('doctor.appointment.doctor-appointment-start', compact('appointment', 'medical_record', 'sessionEndTime'));
    }

    public function availableTiming()
    {
        return view('doctor.doctor-available-timing');
    }

    public function myPatient()
    {
        return view('doctor.patient.my-patient');
    }

    public function patientProfile()
    {
        return view('doctor.patient.patient-profile');
    }

    public function speciality()
    {
        return view('doctor.patient.doctor-speciality');
    }

    public function review()
    {
        return view('doctor.doctor-feedback');
    }

    public function doctorProfileSetting()
    {
        return view('doctor.profile.doctor-profile-setting');
    }

    public function doctorExperienceSetting()
    {
        return view('doctor.profile.doctor-experience-setting');
    }

    public function doctorEducationSetting()
    {
        return view('doctor.profile.doctor-education-setting');
    }

    public function doctorAwardSetting()
    {
        return view('doctor.profile.doctor-award-setting');
    }

    public function doctorInsuranceSetting()
    {
        return view('doctor.profile.doctor-insurance-setting');
    }

    public function doctorClinicSetting()
    {
        return view('doctor.profile.doctor-clinic-setting');
    }

    public function doctorBusinessSetting()
    {
        return view('doctor.profile.doctor-business-setting');
    }

    public function doctorSocialMedia()
    {
        return view('doctor.doctor-social-media');
    }

    public function doctorChangePassword()
    {
        return view('doctor.doctor-change-password');
    }
}
