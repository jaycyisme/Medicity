<?php

namespace App\Livewire\Admin\Appointment;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Service;
use Livewire\Component;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\DoctorService;
use App\Models\MedicalRecord;
use App\Models\ViettelPostCity;
use App\Models\ViettelPostWard;
use App\Models\ConsultationType;
use App\Models\AppointmentStatus;
use App\Models\PaymentMethod;
use App\Models\ViettelPostDistrict;
use Illuminate\Support\Facades\Auth;

class AppointmentCreate extends Component
{
    public $appointment;
    public $speciality;
    public $service;
    public $doctor;
    public $status;
    public $type;
    public $payment_method;
    public $clinic;

    public $patient_name;
    public $patient_phone;
    public $patient_email;
    public $patient_symptoms;
    public $patient_address_detail;
    public $patient_reason_visit;
    public $gender = "Male"; // Default gender
    public $dob;
    public $job;
    public $dependant_role;
    public $dependant_name;
    public $dependant_phone;

    public $citiesList = [];
    public $districtsList = [];
    public $wardsList = [];
    public $address_province;
    public $address_province_name;
    public $address_district;
    public $address_district_name;
    public $address_ward;
    public $address_ward_name;

    public $clinics;
    public $statuses;
    public $types;
    public $paymentMethods;
    public $specialities;
    public $services = [];
    public $doctors = [];

    public function mount() {
        $this->citiesList = ViettelPostCity::get();
        $this->statuses = AppointmentStatus::all();
        $this->types = ConsultationType::all();
        $this->paymentMethods = PaymentMethod::all();
        $this->specialities = Speciality::all();
        $this->clinics = Clinic::all();
    }

    public function onChangeCity()
    {
        if ($this->address_province) {
            $province = ViettelPostCity::find($this->address_province);
            $this->address_province_name = $province->province_name ?? '';
            $this->districtsList = ViettelPostDistrict::where('province_id', $this->address_province)->get();
        }
    }

    public function onChangeDistrict()
    {
        if ($this->address_district) {
            $district = ViettelPostDistrict::find($this->address_district);
            $this->address_district_name = $district->district_name ?? '';
            $this->wardsList = ViettelPostWard::where('district_id', $this->address_district)->get();
        }
    }

    public function onChangeSpeciality()
    {
        if ($this->speciality) {
            $this->services = Service::where('speciality_id', $this->speciality)->get();
            $this->doctors = []; // Reset doctors list when changing speciality
        }
    }

    public function onChangeService()
    {
        if ($this->service) {
            $this->doctors = DoctorService::where('service_id', $this->service)
                ->with('doctor')
                ->get()
                ->pluck('doctor');
        }
    }

    public function store()
    {
        $ward = ViettelPostWard::where('wards_id', $this->address_ward)->first();
        $this->address_ward_name = $ward->wards_name ?? '';
        $this->validate([
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
            'patient_email' => 'required|email',
            'patient_symptoms' => 'required|string|max:500',
            'address_province' => 'required',
            'address_district' => 'required',
            'address_ward' => 'required',
            'patient_address_detail' => 'required|string|max:1000',
            'patient_reason_visit' => 'required|string|max:1000',
            'speciality' => 'required',
            'service' => 'required',
            'doctor' => 'required',
            'status' => 'required',
            'type' => 'required',
        ]);

        $this->appointment = Appointment::create([
            'user_id' => Auth::user()->id,
            'doctor_id' => $this->doctor,
            'status_id' => $this->status,
            'type_id' => $this->type,
            'appointment_code' => 'APT' . time(),
            'clinic_id' => $this->clinic,
            'service_id' => $this->service,
            'speciality_id' => $this->speciality,
            'patient_name' => $this->patient_name,
            'patient_phone' => $this->patient_phone,
            'patient_email' => $this->patient_email,
            'patient_symptoms' => $this->patient_symptoms,
            'patient_province' => $this->address_province_name,
            'patient_district' => $this->address_district_name,
            'patient_ward' => $this->address_ward_name,
            'patient_address_detail' => $this->patient_address_detail,
            'patient_reason_visit' => $this->patient_reason_visit,
            'payment_method_id' => $this->payment_method,
        ]);

        $this->appointment->appointment_code = 'MEDAPT' . str_pad(Appointment::max('id') + 1, 8, '0', STR_PAD_LEFT);
        $this->appointment->business_hour = json_encode([
            'date' => Carbon::now()->format('Y-m-d'),
            'time' => Carbon::now()->format('H:i')
        ]);
        $this->appointment->save();

        $medicalRecord = new MedicalRecord();
        $medicalRecord->appointment_id = $this->appointment->id;
        $medicalRecord->clinic_id = $this->appointment->clinic->id;
        $medicalRecord->service_id = $this->appointment->service->id;
        $medicalRecord->speciality_id = $this->appointment->speciality->id;
        $medicalRecord->medical_record_code = 'MED' . str_pad(MedicalRecord::max('id') + 1, 10, '0', STR_PAD_LEFT);
        $medicalRecord->name = $this->patient_name;
        $medicalRecord->phone = $this->patient_phone;
        $medicalRecord->email = $this->patient_email;
        $medicalRecord->gender = $this->gender;
        $medicalRecord->dob = $this->dob;
        $medicalRecord->job = $this->job;
        $medicalRecord->symptoms = $this->patient_symptoms;
        $medicalRecord->province = $this->address_province_name;
        $medicalRecord->district = $this->address_district_name;
        $medicalRecord->ward = $this->address_ward_name;
        $medicalRecord->address_detail = $this->patient_address_detail;
        $medicalRecord->dependant_role = $this->dependant_role;
        $medicalRecord->dependant_name = $this->dependant_name;
        $medicalRecord->dependant_phone = $this->dependant_phone;

        $medicalRecord->save();

        return redirect()->route('appointment.index')->with('success', 'Appointment created successfully!');
    }


    public function render()
    {
        return view('livewire.admin.appointment.appointment-create');
    }
}
