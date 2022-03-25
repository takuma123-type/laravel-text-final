<?php

namespace App\Repositories;
use DB;
use App\Models\MealRecord;

class MealRepository
{

    private $mealRecordModel;

    public function __construct(MealRecord $mealRecordModel)
    {
        $this->mealRecordModel = $mealRecordModel;
    }

    public function store(array $inputs): MealRecord
    {
        return $this->mealRecordModel->create($inputs);
    }

    public function getAll(): Object
    {
        return $this->mealRecordModel->all();
    }

    public function getDateRecord(string $date): Object
    {
        return $this->mealRecordModel->where('meal_date', $date)->orderBy('meal_kind')->get();
    }

    public function getMealRecord(string $date, string $meal_kind): MealRecord
    {
        return $this->mealRecordModel
            ->where('meal_date', $date)
            ->where('meal_kind', $meal_kind)
            ->first();
    }

    public function update(array $inputs, int $id): int
    {
        return $this->mealRecordModel->whereId($id)->update($inputs);
    }

    public function destroy(int $id): int
    {
        return $this->mealRecordModel->whereId($id)->delete();
    }


}
