<?php

namespace App\Livewire\Admin\Disease;

use App\Models\Disease;
use Livewire\Component;
use App\Models\BodyPart;
use App\Models\SeasonalDisease;
use App\Models\Speciality;
use App\Models\TargetGroup;

class DiseaseUpdate extends Component
{
    public $diseaseId, $name, $overview, $symptoms, $causes, $risk_factors, $diagnosis, $prevention, $treatment, $image_url, $doctor_name, $doctor_image, $doctor_overview, $meal_plan,
    $body_part_id, $target_group_id, $seasonal_id, $speciality_id;
    public $bodyparts, $targetgroups, $seasonals, $specialities;
    public $disease;

    public function mount($diseaseId)
    {
        $this->diseaseId = $diseaseId;
        $this->disease = Disease::findOrFail($this->diseaseId);

        // Load data from the existing service
        $this->name = $this->disease->name;
        $this->overview = $this->disease->overview;
        $this->symptoms = $this->disease->symptoms;
        $this->causes = $this->disease->causes;
        $this->risk_factors = $this->disease->risk_factors;
        $this->diagnosis = $this->disease->diagnosis;
        $this->prevention = $this->disease->prevention;
        $this->treatment = $this->disease->treatment;
        $this->image_url = $this->disease->image_url;
        $this->doctor_name = $this->disease->doctor_name;
        $this->doctor_image = $this->disease->doctor_image;
        $this->doctor_overview = $this->disease->doctor_overview;
        $this->meal_plan = $this->disease->meal_plan;
        $this->body_part_id = $this->disease->body_part_id;
        $this->target_group_id = $this->disease->target_group_id;
        $this->seasonal_id = $this->disease->seasonal_id;
        $this->speciality_id = $this->disease->speciality_id;

        // Get lists of clinics and specialities
        $this->bodyparts = BodyPart::all();
        $this->targetgroups = TargetGroup::all();
        $this->seasonals = SeasonalDisease::all();
        $this->specialities = Speciality::all();
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'overview' => 'required',
        'symptoms' => 'required',
        'causes' => 'required',
        'risk_factors' => 'required',
        'diagnosis' => 'required',
        'prevention' => 'required',
        'treatment' => 'required',
        'image_url' => 'required|string',
        'doctor_name' => 'required|string|max:255',
        'doctor_image' => 'required|string',
        'doctor_overview' => 'required|string',
        'meal_plan' => 'required',
        'body_part_id' => 'nullable|exists:body_parts,id',
        'target_group_id' => 'nullable|exists:target_groups,id',
        'seasonal_id' => 'nullable|exists:seasonal_diseases,id',
        'speciality_id' => 'nullable|exists:specialities,id',
    ];

    public function update() {
        $this->validate();
        // dd($this->body_part_id, $this->target_group_id, $this->seasonal_id, $this->speciality_id);

        $disease = Disease::findOrFail($this->diseaseId);
        $disease->update([
            'name' => $this->name,
            'overview' => $this->overview,
            'symptoms' => $this->symptoms,
            'causes' => $this->causes,
            'risk_factors' => $this->risk_factors,
            'diagnosis' => $this->diagnosis,
            'prevention' => $this->prevention,
            'treatment' => $this->treatment,
            'image_url' => $this->image_url,
            'doctor_name' => $this->doctor_name,
            'doctor_image' => $this->doctor_image,
            'doctor_overview' => $this->doctor_overview,
            'meal_plan' => $this->meal_plan,
            'body_part_id' => $this->body_part_id,
            'target_group_id' => $this->target_group_id,
            'seasonal_id' => $this->seasonal_id,
            'speciality_id' => $this->speciality_id,
        ]);

        // session()->flash('status', 'Disease updated successfully!');
        return redirect()->route('disease.index')->with('success','Disease updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.disease.disease-update');
    }
}
