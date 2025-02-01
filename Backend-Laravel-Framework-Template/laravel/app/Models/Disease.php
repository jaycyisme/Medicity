<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disease extends Model
{
    use HasFactory;
    protected $table = 'diseases';

    protected $fillable = [
        'name',
        'overview',
        'symptoms',
        'causes',
        'risk_factors',
        'diagnosis',
        'prevention',
        'treatment',
        'image_url',
        'doctor_name',
        'doctor_image',
        'doctor_overview',
        'body_part_id',
        'target_group_id',
        'seasonal_group_id',
        'speciality_group_id',
    ];

    protected $casts = [
        'body_part_id' => 'integer',
        'target_group_id' => 'integer',
        'seasonal_group_id' => 'integer',
        'speciality_group_id' => 'integer',
    ];

    public function bodyPart()
    {
        return $this->belongsTo(BodyPart::class, 'body_part_id');
    }

    public function targetGroup()
    {
        return $this->belongsTo(targetGroup::class, 'target_group_id');
    }

    public function seasonalGroup()
    {
        return $this->belongsTo(SeasonalDisease::class, 'seasonal_group_id');
    }

    public function specialityGroup()
    {
        return $this->belongsTo(Speciality::class, 'speciality_group_id');
    }


    public function diseaseProducts()
    {
        return $this->hasMany(DiseaseProduct::class);
    }

    public function diseaseMealPlans()
    {
        return $this->hasMany(DiseaseMealPlan::class);
    }

    public function diseaseDoctors()
    {
        return $this->hasMany(DiseaseDoctor::class);
    }
}
