<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class AppointmentTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $appointments_deleted;
    public function mount() {
        $this->appointments_deleted = Appointment::onlyTrashed()->get();
    }

    public function restore($id) {
        $appointment = Appointment::withTrashed()->findOrfail($id);

        $appointment->restore();

        return redirect()->route('appointment.index')->with('success','Appointment is restored successfuly.');
    }

    public function forceDelete($id) {
        $appointment = Appointment::withTrashed()->findOrfail($id);

        // if($appointment->image_url && Storage::exists('public/Clinic/' . $clinic->image_url)) {
        //     Storage::delete('public/Clinic/' . $clinic->image_url);
        // }

        // foreach ($clinic->clinicImages as $image) {
        //     if (Storage::exists('public/Clinic/' . $image->image_url)) {
        //         Storage::delete('public/Clinic/' . $image->image_url);
        //     }
        // }

        $appointment->forceDelete();

        return redirect()->route('appointment.index')->with('success','Appointment is deleted permanently.');
    }

    public function render()
    {
        $appointments = Appointment::with([
            'user',
            'doctor',
            'service',
            'appointmentStatus',
        ])->whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
        })
        ->orWhereHas('appointmentStatus', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orWhereHas('doctor', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orWhere('created_at', 'like', '%' . $this->search . '%')
        ->orWhere('appointment_code', 'like', '%' . $this->search . '%')
        ->orWhere('patient_name', 'like', '%' . $this->search . '%')
        ->orWhere('patient_phone', 'like', '%' . $this->search . '%')
        ->orWhere('patient_email', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(10);
        // dd($appointments->toArray());


        return view('livewire.appointment-table', [
            'appointments' => $appointments,
        ]);
    }
}
