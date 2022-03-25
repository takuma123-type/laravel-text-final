<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class MealStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'meal_date' => ['required'],

            'meal_kind' => ['required',
                Rule::unique('meal_records')->where(function($query) {
                    $query->where('meal_date', $this->input('meal_date'));
                })
            ],

            'meal_menu' => ['required'],
            'meal_place' => ['required']
        ];
    }
}
