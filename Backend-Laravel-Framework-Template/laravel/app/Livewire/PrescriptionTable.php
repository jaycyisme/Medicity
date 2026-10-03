<?php

namespace App\Livewire;

use App\Models\Prescription;
use Livewire\Component;
use Livewire\WithPagination;

class PrescriptionTable extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function toggleAccept($id)
    {
        $prescription = Prescription::find($id);
        if ($prescription) {
            $prescription->is_accept = !$prescription->is_accept;
            $prescription->save();
        }
    }

    public function render()
    {
        return view('livewire.prescription-table', [
            'prescriptions' => Prescription::orderBy('id', 'DESC')->where('customer_name', 'like', '%'.$this->search.'%')->orWhere('phone', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
