<?php

namespace App\Livewire\Admin\Clinic;

use Exception;
use App\Models\Clinic;
use Livewire\Component;
use App\Models\ClinicImage;
use App\Models\PharmacyAward;

class ClinicUpdate extends Component
{
    public $clinic_id, $name, $phone_number, $image_url, $address_detail, $coordinates, $about_me, $business_hour = [], $images;
    public $awards = [];
    public $clinic;

    public $current_images;

    public function mount($clinicId)
    {
        $this->clinic = Clinic::with(['clinicImages', 'pharmacyAward'])->findOrFail($clinicId);
        $this->clinic_id = $this->clinic->id;
        $this->name = $this->clinic->name;
        $this->phone_number = $this->clinic->phone_number;
        $this->image_url = $this->clinic->image_url;
        $this->address_detail = $this->clinic->address_detail;
        $this->coordinates = $this->clinic->coordinates;
        $this->about_me = $this->clinic->about_me;
        $this->business_hour = json_decode($this->clinic->business_hour, true);
        $this->images = implode(',', $this->clinic->clinicImages->pluck('image_url')->toArray());
        $this->awards = $this->clinic->pharmacyAward->toArray();

        $this->current_images = $this->clinic->clinicImages;
    }

    public function addAward()
    {
        $this->awards[] = ['name' => '', 'description' => '', 'date' => ''];
        $this->awards = array_values($this->awards);
    }

    public function removeAward($index)
    {
        unset($this->awards[$index]);
        $this->awards = array_values($this->awards);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'address_detail' => 'required|string',
            'about_me' => 'required|string',
            'business_hour' => 'required|array',
            'images' => 'nullable|string',
        ]);

        try {
            $imageArray = array_filter(explode(',', $this->images));

            $clinic = Clinic::findOrFail($this->clinic_id);
            $clinic->name = $this->name;
            $clinic->phone_number = $this->phone_number;
            $clinic->image_url = $this->image_url;
            $clinic->address_detail = $this->address_detail;
            $clinic->coordinates = $this->coordinates;
            $clinic->about_me = $this->about_me;
            $clinic->business_hour = json_encode($this->business_hour);
            $clinic->save();

            $clinic->clinicImages()->delete();
            foreach ($imageArray as $image) {
                ClinicImage::create([
                    'clinic_id' => $clinic->id,
                    'image_url' => $image,
                ]);
            }


            $clinic->pharmacyAward()->delete();
            foreach ($this->awards as $award) {
                if (!empty($award['name'])) {
                    $pharmacyAward = new PharmacyAward();
                    $pharmacyAward->pharmacy_id = $clinic->id;
                    $pharmacyAward->name = $award['name'];
                    $pharmacyAward->description = $award['description'];
                    $pharmacyAward->date = $award['date'];
                    $pharmacyAward->save();
                }
            }
            // dd($this->awards);

            session()->flash('success', 'Clinic updated successfully!');
            return redirect()->route('clinic.index');
        } catch (Exception $e) {
            session()->flash('error', 'Error updating clinic: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.clinic.clinic-update');
    }
}
