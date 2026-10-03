<?php

namespace App\Livewire\Medicity\Clinic;

use App\Models\Clinic;
use Livewire\Component;
use Livewire\WithPagination;

class ClinicList extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.medicity.clinic.clinic-list', [
            'clinics' => Clinic::with(['pharmacyReviews'])->orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
