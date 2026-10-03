<?php

namespace App\Livewire;

use App\Models\SeasonalDisease;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class SeasonalTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.seasonal-table', [
            'seasonals' => SeasonalDisease::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
