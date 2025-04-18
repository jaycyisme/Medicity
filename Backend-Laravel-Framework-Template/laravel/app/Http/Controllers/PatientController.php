<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\LaboratoryResult;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function dashboard()
    {
        return view('patient.patient-dashboard');
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

    public function profileSetting()
    {
        return view('patient.profile-setting');
    }

    public function changePassword()
    {
        return view('patient.change-password');
    }
}
