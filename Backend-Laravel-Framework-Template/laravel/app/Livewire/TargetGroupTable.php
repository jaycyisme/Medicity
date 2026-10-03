<?php

namespace App\Livewire;

use App\Models\TargetGroup;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class TargetGroupTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.target-group-table', [
            'targetgroups' => TargetGroup::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
