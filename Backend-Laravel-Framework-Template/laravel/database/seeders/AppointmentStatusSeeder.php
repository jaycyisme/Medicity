<?php

namespace Database\Seeders;

use App\Models\AppointmentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointmentStatuses = [
            'Waiting',
            'Completed',
            'Upcoming',
            'Cancelled',
            'Paid',
            'Unpaid',
        ];

        foreach($appointmentStatuses as $appointmentStatus) {
            AppointmentStatus::create(['name' => $appointmentStatus]);
        }
    }
}
