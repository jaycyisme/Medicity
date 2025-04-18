<?php

namespace Database\Seeders;

use App\Models\AppointmentRequestType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentRequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointmentRequestTypes = [
            'Online',
            'Offline',
            'Home Visit',
        ];

        foreach($appointmentRequestTypes as $appointmentRequestType) {
            AppointmentRequestType::create(['name' => $appointmentRequestType]);
        }
    }
}
