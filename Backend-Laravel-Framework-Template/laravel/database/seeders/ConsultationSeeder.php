<?php

namespace Database\Seeders;

use App\Models\ConsultationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consultationTypes = [
            'Online',
            'Offline',
            'Home Visit',
        ];

        foreach($consultationTypes as $consultationType) {
            ConsultationType::create(['name' => $consultationType]);
        }
    }
}
