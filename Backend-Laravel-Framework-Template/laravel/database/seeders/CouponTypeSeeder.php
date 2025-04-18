<?php

namespace Database\Seeders;

use App\Models\CouponType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couponTypes = [
            'fixed',
            'percentage',
        ];

        foreach($couponTypes as $couponType) {
            CouponType::create(['name' => $couponType]);
        }
    }
}
