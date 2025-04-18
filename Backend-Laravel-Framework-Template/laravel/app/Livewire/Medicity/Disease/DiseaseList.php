<?php

namespace App\Livewire\Medicity\Disease;

use App\Models\Disease;
use Livewire\Component;
use App\Models\BodyPart;
use App\Models\Speciality;
use App\Models\TargetGroup;
use Livewire\WithPagination;

class DiseaseList extends Component
{
    use WithPagination;

    public $search = '';
    public $specialityFilter = null;
    public $targetGroupFilter = null;
    public $bodyPartFilter = null;

    protected $paginationTheme = 'bootstrap';

    // Reset page khi có sự thay đổi về tìm kiếm
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
        // Truy vấn các bệnh
        $query = Disease::query();

        // Tìm kiếm theo tên bệnh
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        // Lọc theo chuyên khoa
        if ($this->specialityFilter) {
            $query->where('speciality_id', $this->specialityFilter);
        }

        // Lọc theo nhóm đối tượng
        if ($this->targetGroupFilter) {
            $query->where('target_group_id', $this->targetGroupFilter);
        }

        // Lọc theo bộ phận cơ thể
        if ($this->bodyPartFilter) {
            $query->where('body_part_id', $this->bodyPartFilter);
        }

        // Lấy kết quả đã phân trang
        $diseases = $query->orderBy('id', 'DESC')->paginate(10);

        return view('livewire.medicity.disease.disease-list', [
            'diseases' => $diseases,
            'specialities' => Speciality::all(),
            'targetGroups' => TargetGroup::all(),
            'bodyParts' => BodyPart::all(),
        ]);
    }
}
