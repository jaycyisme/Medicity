<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaboratoryResult extends Model
{
    use HasFactory;
    protected $table = 'laboratory_results';

    protected $fillable = [
        'medical_record_id',
        'laboratory_test_id',
        'result',
        'position',
    ];

    public function laboratoryTest()
    {
        return $this->belongsTo(LaboratoryTest::class, 'laboratory_test_id');
    }

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class, 'medical_record_id');
    }
}
