<?php

namespace App\Livewire;

use App\Models\Disease;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class DiseaseTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.disease-table', [
            'diseases' => Disease::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
