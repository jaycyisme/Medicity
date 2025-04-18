<?php

namespace App\Livewire;

use App\Models\LaboratoryTest;
use Livewire\Component;
use Livewire\WithPagination;

class LaboratoryTestTable extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.laboratory-test-table', [
            'laboratory_tests' => LaboratoryTest::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
