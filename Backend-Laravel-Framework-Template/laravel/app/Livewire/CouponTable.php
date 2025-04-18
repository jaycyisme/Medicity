<?php

namespace App\Livewire;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class CouponTable extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.coupon-table', [
            'coupons' => Coupon::orderBy('id', 'DESC')->where('title', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
