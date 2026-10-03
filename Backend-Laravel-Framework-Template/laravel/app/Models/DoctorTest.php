<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorTest extends Model
{
    use HasFactory;
    protected $table = 'doctor_tests';

    protected $fillable = [
        'doctor_id',
        'test_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function test()
    {
        return $this->belongsTo(LaboratoryTest::class, 'test_id');
    }
}
