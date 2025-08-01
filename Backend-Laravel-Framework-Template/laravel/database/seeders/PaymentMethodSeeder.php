<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            'Cash on Delivery',
            'Transfer',
        ];

        foreach($paymentMethods as $paymentMethod) {
            PaymentMethod::create(['name' => $paymentMethod]);
        }
    }
}
