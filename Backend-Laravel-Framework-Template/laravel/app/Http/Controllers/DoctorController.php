<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Chat;
use App\Models\User;
use App\Models\Appointment;
use App\Models\DoctorClinic;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\LaboratoryResult;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    public function getWeeklyStats()
    {
        $doctorId = Auth::id();

        $revenues = [];
        $appointments = [];

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->startOfWeek()->addDays($i);

            $revenue = Appointment::where('doctor_id', $doctorId)
                ->where('status_id', 2)
                ->whereDate('created_at', $date)
                ->sum('appointment_final_price');

            $appointmentCount = Appointment::where('doctor_id', $doctorId)
                ->where('status_id', 2)
                ->whereDate('created_at', $date)
                ->count();

            $revenues[] = round($revenue, 2);
            $appointments[] = $appointmentCount;
        }

        return response()->json([
            'revenue' => $revenues,
            'appointments' => $appointments,
        ]);
    }

    public function dashboard()
    {
        $doctorId = Auth::id();

        $totalPatients = Appointment::where('doctor_id', $doctorId)
            ->where('status_id', 2)
            ->count();

        $patientsToday = Appointment::where('doctor_id', $doctorId)
            ->where('status_id', 2)
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Tổng tuần này (tính từ đầu tuần)
        $thisWeekPatients = Appointment::where('doctor_id', $doctorId)
            ->where('status_id', 2)
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->count();

        // Tổng tuần trước
        $lastWeekPatients = Appointment::where('doctor_id', $doctorId)
            ->where('status_id', 2)
            ->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfWeek(),
                Carbon::now()->subWeek()->endOfWeek()
            ])->count();

        // Tổng hôm qua
        $yesterdayPatients = Appointment::where('doctor_id', $doctorId)
            ->where('status_id', 2)
            ->whereDate('created_at', Carbon::yesterday())
            ->count();

        // % thay đổi tuần
        $percentChangeWeek = $lastWeekPatients > 0
            ? round((($thisWeekPatients - $lastWeekPatients) / $lastWeekPatients) * 100, 1)
            : ($thisWeekPatients > 0 ? 100 : 0);

        // % thay đổi ngày
        $percentChangeDay = $yesterdayPatients > 0
            ? round((($patientsToday - $yesterdayPatients) / $yesterdayPatients) * 100, 1)
            : ($patientsToday > 0 ? 100 : 0);

        $recentRequests = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
            'speciality'
        ])->where('doctor_id', $doctorId)
          ->where('status_id', 5)->take(5)->get();

        $recentPatients = Appointment::with('user')
            ->where('doctor_id', $doctorId)
            ->whereNotNull('user_id')
            ->where('status_id', 2)
            ->latest('created_at')
            ->get()
            ->unique('user_id')
            ->take(5);

        $recentCompletedAppointments = Appointment::with([
            'clinic',
            'user',
            'doctor',
            'service.speciality',
            'appointmentRequestType',
        ])
            ->where('doctor_id', $doctorId)
            ->where('status_id', 2) // Đã hoàn thành
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        $doctorClinics = DoctorClinic::with('clinic')
            ->where('doctor_id', Auth::id())
            ->get();
        return view('doctor.doctor-dashboard', compact(
            'totalPatients',
            'patientsToday',
            'percentChangeWeek',
            'percentChangeDay',
            'recentRequests',
            'recentPatients',
            'recentCompletedAppointments',
            'doctorClinics'
        ));
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
        $laboratoryResults = LaboratoryResult::with('laboratoryTest')->where('medical_record_id', $medical_record->id)->get();
        return view('doctor.appointment.doctor-completed-appointment', compact('appointment', 'medical_record', 'medications', 'laboratoryResults'));
    }

    public function appointmentStart($id)
    {
        $appointment = Appointment::findOrFail($id);
        $medical_record = MedicalRecord::where('appointment_id', $appointment->id)->first();

        // Decode business_hour JSON
        $businessHour = json_decode($appointment->business_hour, true);

        // if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
        //     $sessionEndTime = null;
        // } else {
        //     $startDateTime = Carbon::parse("{$businessHour['date']} {$businessHour['time']}");
        //     $sessionEndTime = $startDateTime->addMinutes($appointment->service->duration);
        // }

        return view('doctor.appointment.doctor-appointment-start', compact('appointment', 'medical_record'));
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

    public function showMeetingPage()
    {
        return view('doctor.meeting');
    }
}
