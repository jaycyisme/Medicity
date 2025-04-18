<?php

namespace App\Livewire\Medicity\Doctor;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\SymptomImage;
use App\Models\ViettelPostCity;
use App\Models\ViettelPostWard;
use App\Models\ViettelPostDistrict;
use Illuminate\Support\Facades\Validator;

class BookingInformation extends Component
{
    public $appointment;
    public $medRecord;
    public $averageStars;
    public $doctor;
    public $formattedDateTime;
    public $images;

    public $patient_name;
    public $patient_phone;
    public $patient_email;
    public $patient_symptoms;
    public $patient_address_detail;
    public $patient_reason_visit;
    public $gender;
    public $dob;
    public $job;
    public $dependant_role;
    public $dependant_name;
    public $dependant_phone;
    public $height;
    public $weight;

    public $citiesList = [];
    public $districtsList = [];
    public $wardsList = [];
    public $address_province;
    public $address_province_name;
    public $address_district;
    public $address_district_name;
    public $address_ward;
    public $address_ward_name;

    public function mount($id)
    {
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
        $this->citiesList = ViettelPostCity::get();

        $this->patient_name = $this->appointment->patient_name ?? '';
        $this->patient_phone = $this->appointment->patient_phone ?? '';
        $this->patient_email = $this->appointment->patient_email ?? '';
        $this->patient_symptoms = $this->appointment->patient_symptoms ?? '';
        $this->address_province_name = $this->appointment->patient_province ?? '';
        $this->address_district_name = $this->appointment->patient_district ?? '';
        $this->address_ward_name = $this->appointment->patient_ward ?? '';
        $this->patient_address_detail = $this->appointment->patient_address_detail ?? '';
        $this->patient_reason_visit = $this->appointment->patient_reason_visit ?? '';

        $this->medRecord = MedicalRecord::where('appointment_id', $this->appointment->id)->first();
        if($this->medRecord) {
            $this->gender = $this->medRecord->gender ?? 'Male';
            $this->dob = $this->medRecord->dob ?? '';
            $this->job = $this->medRecord->job ?? '';
            $this->dependant_role = $this->medRecord->dependant_role ?? '';
            $this->dependant_name = $this->medRecord->dependant_name ?? '';
            $this->dependant_phone = $this->medRecord->dependant_phone ?? '';
            $this->height = $this->medRecord->height ?? '';
            $this->weight = $this->medRecord->weight ?? '';
        }

        $this->images = SymptomImage::where('appointment_id', $this->appointment->id)->pluck('image_url')->implode(',');

        if ($this->address_province_name) {
            $province = ViettelPostCity::where('province_name', $this->address_province_name)->first();
            if ($province) {
                $this->address_province = $province->province_id;
                $this->districtsList = ViettelPostDistrict::where('province_id', $this->address_province)->get();
            }
        }

        if ($this->address_district_name) {
            $district = ViettelPostDistrict::where('district_name', $this->address_district_name)->first();
            $ward = ViettelPostWard::where('wards_name', $this->address_ward_name)->first();
            if ($district) {
                $this->address_district = $district->district_id;
                $this->address_ward = $ward->wards_id;
                $this->wardsList = ViettelPostWard::where('district_id', $this->address_district)->get();
            }
        }
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

    public function onChangeCity()
    {
        if ($this->address_province) {
            $province = ViettelPostCity::where('province_id', $this->address_province)->first();
            $this->address_province_name = $province->province_name ?? '';

            $this->districtsList = ViettelPostDistrict::where('province_id', $this->address_province)->get();
            $this->address_district = null;
            $this->address_ward = null;
            $this->wardsList = [];
        }
    }

    public function onChangeDistrict()
    {
        if ($this->address_district) {
            $district = ViettelPostDistrict::where('district_id', $this->address_district)->first();
            $this->address_district_name = $district->district_name ?? '';

            $this->wardsList = ViettelPostWard::where('district_id', $this->address_district)->get();
            $this->address_ward = null;
        }
    }

    public function updateAppointment() {
        $ward = ViettelPostWard::where('wards_id', $this->address_ward)->first();
        $this->address_ward_name = $ward->wards_name ?? '';

        $validator = Validator::make([
            'patient_name' => $this->patient_name,
            'patient_phone' => $this->patient_phone,
            'patient_email' => $this->patient_email,
            'patient_symptoms' => $this->patient_symptoms,
            'address_province' => $this->address_province,
            'address_district' => $this->address_district,
            'address_ward' => $this->address_ward,
            'patient_address_detail' => $this->patient_address_detail,
            'patient_reason_visit' => $this->patient_reason_visit,
        ], [
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
            'patient_email' => 'required|email',
            'patient_symptoms' => 'required|string|max:500',
            'address_province' => 'required',
            'address_district' => 'required',
            'address_ward' => 'required',
            'patient_address_detail' => 'required|string|max:1000',
            'patient_reason_visit' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('appointment-info', ['id' => $this->appointment->id])
                ->with('error', 'Please enter entire data before proceeding.');
        }

        $this->appointment->update([
            'patient_name' => $this->patient_name,
            'patient_phone' => $this->patient_phone,
            'patient_email' => $this->patient_email,
            'patient_symptoms' => $this->patient_symptoms,
            'patient_province' => $this->address_province_name,
            'patient_district' => $this->address_district_name,
            'patient_ward' => $this->address_ward_name,
            'patient_address_detail' => $this->patient_address_detail,
            'patient_reason_visit' => $this->patient_reason_visit,
        ]);

        $medicalRecord = MedicalRecord::where('appointment_id', $this->appointment->id)->first();

        if ($medicalRecord) {
            $medicalRecord->update([
                'name' => $this->patient_name,
                'phone' => $this->patient_phone,
                'email' => $this->patient_email,
                'gender' => $this->gender,
                'dob' => $this->dob,
                'job' => $this->job,
                'symptoms' => $this->patient_symptoms,
                'province' => $this->address_province_name,
                'district' => $this->address_district_name,
                'ward' => $this->address_ward_name,
                'address_detail' => $this->patient_address_detail,
                'dependant_role' => $this->dependant_role,
                'dependant_name' => $this->dependant_name,
                'dependant_phone' => $this->dependant_phone,
                'height' => $this->height,
                'weight' => $this->weight,
            ]);
        } else {
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
            $medicalRecord->height = $this->height;
            $medicalRecord->weight = $this->weight;
            $medicalRecord->save();
        }

        $imageArray = array_filter(explode(',', $this->images));

        foreach ($imageArray as $image) {
            $symptomImage = new SymptomImage();
            $symptomImage->appointment_id = $this->appointment->id;
            $symptomImage->medical_record_id = $medicalRecord->id;
            $symptomImage->image_url = $image;
            $symptomImage->save();
        }

        return redirect()->route('appointment-checkout', ['id' => $this->appointment->id]);
    }


    public function render()
    {
        return view('livewire.medicity.doctor.booking-information');
    }
}
