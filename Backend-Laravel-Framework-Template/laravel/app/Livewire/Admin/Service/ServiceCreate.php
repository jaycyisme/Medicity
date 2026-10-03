<?php

namespace App\Livewire\Admin\Service;

use App\Models\Clinic;
use App\Models\Service;
use Livewire\Component;
use App\Models\Speciality;
use App\Models\ServiceImage;

class ServiceCreate extends Component
{
    public $name, $duration, $price, $description, $clinic_id, $speciality_id, $thumbnail, $images;
    public $clinics;
    public $specialities;

    public function mount()
    {
        $this->clinics = Clinic::all();
        $this->specialities = Speciality::all();
        $this->description = '';

        $this->clinic_id = Clinic::first()->id;
        $this->speciality_id = Speciality::first()->id;
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'duration' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
        'description' => 'required',
        'clinic_id' => 'required|exists:clinics,id',
        'speciality_id' => 'required|exists:specialities,id',
        'thumbnail' => 'nullable|string',
        'images.*' => 'nullable|string',
    ];

    public function save() {
        $this->validate();
        $imageArray = array_filter(explode(',', $this->images));

        $service = Service::create([
            'name' => $this->name,
            'duration' => $this->duration,
            'price' => $this->price,
            'description' => $this->description,
            'clinic_id' => $this->clinic_id,
            'speciality_id' => $this->speciality_id,
            'thumbnail' => $this->thumbnail,
        ]);

        if ($imageArray) {
            foreach ($imageArray as $image) {
                ServiceImage::create([
                    'service_id' => $service->id,
                    'image_url' => $image,
                ]);
            }
        }

        $this->reset(['name', 'duration', 'price', 'description', 'clinic_id', 'speciality_id', 'thumbnail', 'images']);

        // session()->flash('status', 'Service created successfully!');
        return redirect()->route('service.index')->with('success','Service created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.service.service-create');
    }
}
