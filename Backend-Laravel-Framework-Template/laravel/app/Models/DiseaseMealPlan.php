<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiseaseMealPlan extends Model
{
    use HasFactory;
    protected $table = 'disease_meal_plans';

    protected $fillable = [
        'disease_id',
        'meal_plan_id',
    ];

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }

    public function mealPlan()
    {
        return $this->belongsTo(MealPlan::class, 'meal_plan_id');
    }
}
