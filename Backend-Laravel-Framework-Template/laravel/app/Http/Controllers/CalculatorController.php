<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    function calculateBMR($weight, $height, $age, $gender)
    {
        return $gender === 'male'
            ? 10 * $weight + 6.25 * $height - 5 * $age + 5
            : 10 * $weight + 6.25 * $height - 5 * $age - 161;
    }

    function getActivityFactor($nonExerciseActivity, $exerciseLevel)
    {
        $base = [
            'veryLight' => 1.2,
            'light' => 1.4,
            'moderate' => 1.6,
            'heavy' => 1.75
        ][$nonExerciseActivity] ?? 1.2;

        $exerciseBonus = [
            'veryLight' => 0.0,
            'light' => 0.1,
            'moderate' => 0.2,
            'intense' => 0.3,
            'veryIntense' => 0.4
        ][$exerciseLevel] ?? 0.0;

        return $base + $exerciseBonus;
    }

    function getMacroSplitByEatingStyle($eatingStyle)
    {
        return [
            'anything' => ['protein' => 0.3, 'carbs' => 0.4, 'fat' => 0.3],
            'mediterranean' => ['protein' => 0.25, 'carbs' => 0.45, 'fat' => 0.3],
            'paleo' => ['protein' => 0.35, 'carbs' => 0.3, 'fat' => 0.35],
            'vegetarian' => ['protein' => 0.25, 'carbs' => 0.5, 'fat' => 0.25],
            'ketogenic' => ['protein' => 0.2, 'carbs' => 0.1, 'fat' => 0.7],
            'plantBased' => ['protein' => 0.25, 'carbs' => 0.55, 'fat' => 0.2],
        ][$eatingStyle] ?? ['protein' => 0.3, 'carbs' => 0.4, 'fat' => 0.3];
    }

    function adjustCalories($currentWeight, $goalWeight, $targetDate, $maintenanceCalories)
    {
        $days = max((strtotime($targetDate) - time()) / 86400, 1);
        $weightChange = $currentWeight - $goalWeight;
        $totalDeficit = $weightChange * 7700; // kcal cần giảm

        $dailyDeficit = $totalDeficit / $days;

        // Giới hạn deficit mỗi ngày (vd: max 1000 kcal/ngày)
        $maxDeficit = 1000;
        $dailyDeficit = max(min($dailyDeficit, $maxDeficit), -$maxDeficit);

        return round($maintenanceCalories - $dailyDeficit);
    }

    function calculateMacrosWithPercentage($calories, $split)
    {
        return [
            'protein_g' => round(($calories * $split['protein']) / 4),
            'carbs_g'   => round(($calories * $split['carbs']) / 4),
            'fat_g'     => round(($calories * $split['fat']) / 9),
            'protein_percent' => $split['protein'] * 100,
            'carbs_percent'   => $split['carbs'] * 100,
            'fat_percent'     => $split['fat'] * 100,
        ];
    }

    function convertMacrosToHandPortions($macros, $mealsPerDay = 3, $gender = 'male')
    {
        $proteinPerPortion = $gender === 'male' ? 30 : 20;
        $carbsPerPortion   = $gender === 'male' ? 30 : 20;
        $fatPerPortion     = 14;

        return [
            'protein' => [
                'per_day_grams' => $macros['protein_g'],
                'per_meal_grams' => round($macros['protein_g'] / $mealsPerDay),
                'portions_per_day' => round($macros['protein_g'] / $proteinPerPortion),
                'portions_per_meal' => round($macros['protein_g'] / $proteinPerPortion / $mealsPerDay),
            ],
            'carbs' => [
                'per_day_grams' => $macros['carbs_g'],
                'per_meal_grams' => round($macros['carbs_g'] / $mealsPerDay),
                'portions_per_day' => round($macros['carbs_g'] / $carbsPerPortion),
                'portions_per_meal' => round($macros['carbs_g'] / $carbsPerPortion / $mealsPerDay),
            ],
            'fat' => [
                'per_day_grams' => $macros['fat_g'],
                'per_meal_grams' => round($macros['fat_g'] / $mealsPerDay),
                'portions_per_day' => round($macros['fat_g'] / $fatPerPortion),
                'portions_per_meal' => round($macros['fat_g'] / $fatPerPortion / $mealsPerDay),
            ],
            'veggies' => [
                'portions_per_day' => 4,
                'portions_per_meal' => round(4 / $mealsPerDay),
            ],
        ];
    }

    function calculateNutritionProfile(Request $request)
    {
        $gender = $request->input('gender');
        $goal = $request->input('goal');
        $eatingStyle = $request->input('eating_style');
        $dailyActivity = $request->input('daily_activity');
        $exerciseLevel = $request->input('exercise_level');

        $input = [
            'age' => (int) $request->input('age'),
            'height' => (float) $request->input('height'),
            'weight' => (float) $request->input('weight'),
            'gender' => $gender,
            'goal' => $goal,
            'goal_weight' => (float) $request->input('goal_weight'),
            'target_date' => $request->input('target_date'),
            'eating_style' => $eatingStyle,
            'meals_per_day' => (int) $request->input('meals_per_day', 3),
            'daily_activity' => $dailyActivity,
            'exercise_level' => $exerciseLevel,
        ];

        $bmr = $this->calculateBMR($input['weight'], $input['height'], $input['age'], $input['gender']);
        $activityFactor = $this->getActivityFactor($input['daily_activity'], $input['exercise_level']);
        $maintenanceCalories = round($bmr * $activityFactor);
        $adjustedCalories = $this->adjustCalories($input['weight'], $input['goal_weight'], $input['target_date'], $maintenanceCalories);
        $macroSplit = $this->getMacroSplitByEatingStyle($input['eating_style']);
        $macros = $this->calculateMacrosWithPercentage($adjustedCalories, $macroSplit);
        $portions = $this->convertMacrosToHandPortions($macros, $input['meals_per_day'], $input['gender']);

        // dd($input, $adjustedCalories, $macros, $portions);

        return view('medicity/calculator/calculator-result', [
            'information' => $input,
            'calories_per_day' => $adjustedCalories,
            'macros' => $macros,
            'portions' => $portions
        ]);
    }
}
