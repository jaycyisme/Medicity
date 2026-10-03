<?php

namespace App\Livewire\Patient\Favourite;

use App\Models\DoctorFavourite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Favourite extends Component
{
    public $doctorFavourites;

    public function mount() {
        $this->doctorFavourites = DoctorFavourite::where('patient_id', Auth::user()->id)->with([
            'doctor.doctorFeedbacks',
            'doctor.doctorServices.service',
        ])->get();
    }

    public function toggleFavourite($doctorId)
    {
        $favourite = DoctorFavourite::where('patient_id', Auth::user()->id)
                                    ->where('doctor_id', $doctorId)
                                    ->first();

        if ($favourite) {
            $favourite->delete();
        } else {
            DoctorFavourite::create([
                'patient_id' => Auth::user()->id,
                'doctor_id' => $doctorId,
            ]);
        }

        $this->doctorFavourites = DoctorFavourite::where('patient_id', Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.patient.favourite.favourite');
    }
}
