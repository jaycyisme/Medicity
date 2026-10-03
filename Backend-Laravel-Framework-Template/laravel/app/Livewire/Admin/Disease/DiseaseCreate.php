<?php

namespace App\Livewire\Admin\Disease;

use App\Models\BodyPart;
use App\Models\Disease;
use App\Models\SeasonalDisease;
use App\Models\Speciality;
use App\Models\TargetGroup;
use Livewire\Component;

class DiseaseCreate extends Component
{
    public $name, $overview, $symptoms, $causes, $risk_factors, $diagnosis, $prevention, $treatment, $image_url, $doctor_name, $doctor_image, $doctor_overview, $meal_plan,
    $body_part_id, $target_group_id, $seasonal_id, $speciality_id;
    public $bodyparts, $targetgroups, $seasonals, $specialities;

    public function mount() {
        $this->bodyparts = BodyPart::all();
        $this->targetgroups = TargetGroup::all();
        $this->seasonals = SeasonalDisease::all();
        $this->specialities = Speciality::all();

        $this->body_part_id = BodyPart::first()->id;
        $this->target_group_id = TargetGroup::first()->id;
        $this->seasonal_id = SeasonalDisease::first()->id;
        $this->speciality_id = Speciality::first()->id;
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

    public function save() {
        $this->validate();

        $disease = Disease::create([
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

        // session()->flash('status', 'Disease created successfully!');
        return redirect()->route('disease.index')->with('success','Disease created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.disease.disease-create');
    }
}
