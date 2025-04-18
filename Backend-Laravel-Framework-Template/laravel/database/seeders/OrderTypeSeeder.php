<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderTypes = [
            'Online',
            'Instore'
        ];

        foreach($orderTypes as $orderType) {
            OrderType::create(['name' => $orderType]);
        }
    }
}
