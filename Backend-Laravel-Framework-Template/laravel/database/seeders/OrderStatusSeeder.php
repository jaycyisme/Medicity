<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderStatuses = [
            'pending',
            'processing',
            'shipped',
            'delivered',
            'cancelled',
            'refunded'
        ];

        foreach($orderStatuses as $orderStatus) {
            OrderStatus::create(['name' => $orderStatus]);
        }
    }
}
