<?php

namespace App\Livewire\Admin\Clinic;

use Exception;
use App\Models\Clinic;
use Livewire\Component;
use App\Models\ClinicImage;
use App\Models\PharmacyAward;

class ClinicCreate extends Component
{
    public $name, $phone_number, $image_url, $address_detail, $coordinates, $about_me, $business_hour = [], $images;
    public $awards = [];

    public function mount()
    {
        // Khởi tạo business_hour mặc định cho 7 ngày
        $this->business_hour = [
            'Monday' => ['start' => null, 'end' => null],
            'Tuesday' => ['start' => null, 'end' => null],
            'Wednesday' => ['start' => null, 'end' => null],
            'Thursday' => ['start' => null, 'end' => null],
            'Friday' => ['start' => null, 'end' => null],
            'Saturday' => ['start' => null, 'end' => null],
            'Sunday' => ['start' => null, 'end' => null],
        ];
    }

    public function addAward()
    {
        $this->awards[] = ['name' => '', 'description' => '', 'date' => ''];
    }

    public function removeAward($index)
    {
        unset($this->awards[$index]);
        $this->awards = array_values($this->awards);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'address_detail' => 'required|string',
            'about_me' => 'required|string',
            'business_hour' => 'required|array',
            'image_url' => 'nullable|string',
            'images' => 'nullable|string',
        ]);

        try {
            $imageArray = array_filter(explode(',', $this->images));

            $clinic = new Clinic();
            $clinic->name = $this->name;
            $clinic->phone_number = $this->phone_number;
            $clinic->image_url = $this->image_url;
            $clinic->address_detail = $this->address_detail;
            $clinic->coordinates = $this->coordinates;
            $clinic->about_me = $this->about_me;
            $clinic->business_hour = json_encode($this->business_hour);
            $clinic->save();

            foreach ($imageArray as $image) {
                $clinicImage = new ClinicImage();
                $clinicImage->clinic_id = $clinic->id;
                $clinicImage->image_url = $image;
                $clinicImage->save();
            }

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

            session()->flash('success', 'Clinic created successfully!');
            return redirect()->route('clinic.index')->with('success','Clinic created successfully!');
        } catch (Exception $e) {
            session()->flash('error', 'Error creating clinic: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.clinic.clinic-create');
    }
}
