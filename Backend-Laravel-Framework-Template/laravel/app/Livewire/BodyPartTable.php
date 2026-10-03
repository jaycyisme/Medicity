<?php

namespace App\Livewire;

use App\Models\BodyPart;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class BodyPartTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.body-part-table', [
            'bodyparts' => BodyPart::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
