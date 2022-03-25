<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'meal_date' => ['required'],
            'meal_kind' => ['required'],
            'meal_menu' => ['required'],
            'meal_place' => ['required'],
            'meal_shop_name' => [],
            'meal_shop_price' => []
        ];
    }
}
