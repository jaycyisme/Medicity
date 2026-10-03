<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentStatuses = [
            'pending',
            'paid',
            'failed',
            'refunded'
        ];

        foreach($paymentStatuses as $paymentStatus) {
            PaymentStatus::create(['name' => $paymentStatus]);
        }
    }
}
