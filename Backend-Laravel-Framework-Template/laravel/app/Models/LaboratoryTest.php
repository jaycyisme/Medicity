<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaboratoryTest extends Model
{
    use HasFactory;
    protected $table = 'laboratory_tests';

    protected $fillable = [
        'name',
        'image_url',
        'price',
    ];

    public function laboratoryResults()
    {
        return $this->hasMany(LaboratoryResult::class)->withTrashed();
    }
}
