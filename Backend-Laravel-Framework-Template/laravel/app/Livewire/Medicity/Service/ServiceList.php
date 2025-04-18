<?php

namespace App\Livewire\Medicity\Service;

use App\Models\Clinic;
use App\Models\Service;
use Livewire\Component;
use App\Models\Speciality;
use Livewire\WithPagination;

class ServiceList extends Component
{
    use WithPagination;

    public $search = '';
    public $specialityFilter = null;
    public $clinicFilter = null;
    public $ratingFilter = null;
    public $priceFilter = null;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function filterChange()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Service::query();

        // Tìm kiếm theo tên dịch vụ
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        // Lọc theo chuyên khoa
        if ($this->specialityFilter) {
            $query->where('speciality_id', $this->specialityFilter);
        }

        // Lọc theo phòng khám
        if ($this->clinicFilter) {
            $query->where('clinic_id', $this->clinicFilter);
        }

        // Lọc theo đánh giá sao
        if ($this->ratingFilter) {
            $query->whereHas('serviceFeedbacks', function ($q) {
                $q->havingRaw('AVG(star) >= ?', [$this->ratingFilter]);
            });
        }

        // Lọc theo mức giá
        if ($this->priceFilter) {
            $query->where('price', '<=', $this->priceFilter);
        }

        $services = $query->orderBy('id', 'DESC')->paginate(10);

        return view('livewire.medicity.service.service-list', [
            'services' => $services,
            'specialities' => Speciality::all(),
            'clinics' => Clinic::all(),
        ]);
    }
}
