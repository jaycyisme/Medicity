<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ServiceTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.service-table', [
            'services' => Service::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
