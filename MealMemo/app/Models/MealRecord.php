<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_date',
        'meal_kind',
        'meal_menu',
        'meal_place',
        'meal_shop_name',
        'meal_shop_price',
        'calorie_id'
    ];
}
