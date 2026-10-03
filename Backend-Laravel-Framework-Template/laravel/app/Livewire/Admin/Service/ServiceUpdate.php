<?php

namespace App\Livewire\Admin\Service;

use App\Models\Clinic;
use App\Models\Service;
use Livewire\Component;
use App\Models\Speciality;
use App\Models\ServiceImage;

class ServiceUpdate extends Component
{
    public $serviceId, $name, $duration, $price, $description, $clinic_id, $speciality_id, $thumbnail, $images = [];
    public $clinics, $specialities, $current_images;
    public $service;

    public function mount($serviceId)
    {
        $this->serviceId = $serviceId;
        $this->service = Service::findOrFail($this->serviceId);

        // Load data from the existing service
        $this->name = $this->service->name;
        $this->duration = $this->service->duration;
        $this->price = $this->service->price;
        $this->description = $this->service->description;
        $this->clinic_id = $this->service->clinic_id;
        $this->speciality_id = $this->service->speciality_id;
        $this->thumbnail = $this->service->thumbnail;

        // Load existing images
        $this->current_images = $this->service->serviceImages;

        // Get lists of clinics and specialities
        $this->clinics = Clinic::all();
        $this->specialities = Speciality::all();
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

    public function update() {
        $this->validate();

        $service = Service::findOrFail($this->serviceId);
        $service->update([
            'name' => $this->name,
            'duration' => $this->duration,
            'price' => $this->price,
            'description' => $this->description,
            'clinic_id' => $this->clinic_id,
            'speciality_id' => $this->speciality_id,
            'thumbnail' => $this->thumbnail,
        ]);

        // Update images if new images are uploaded
        if ($this->images) {
            foreach ($this->images as $image) {
                ServiceImage::create([
                    'service_id' => $service->id,
                    'image_url' => $image,
                ]);
            }
        }

        // session()->flash('status', 'Service updated successfully!');
        return redirect()->route('service.index')->with('success','Service updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.service.service-update');
    }
}
