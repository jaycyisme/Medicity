<?php

namespace App\Livewire;

use App\Models\Clinic;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ClinicTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $clinics_deleted;
    public function mount() {
        $this->clinics_deleted = Clinic::onlyTrashed()->get();
    }

    public function restore($id) {
        $clinic = Clinic::withTrashed()->findOrfail($id);

        $clinic->restore();

        return redirect()->route('clinic.index')->with('success','Clinic is restored successfuly.');
    }

    public function forceDelete($id) {
        $clinic = Clinic::withTrashed()->findOrfail($id);

        if($clinic->image_url && Storage::exists('public/Clinic/' . $clinic->image_url)) {
            Storage::delete('public/Clinic/' . $clinic->image_url);
        }

        foreach ($clinic->clinicImages as $image) {
            if (Storage::exists('public/Clinic/' . $image->image_url)) {
                Storage::delete('public/Clinic/' . $image->image_url);
            }
        }

        $clinic->forceDelete();

        return redirect()->route('clinic.index')->with('success','Clinic is deleted permanently.');
    }

    public function render()
    {
        return view('livewire.clinic-table', [
            'clinics' => Clinic::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
