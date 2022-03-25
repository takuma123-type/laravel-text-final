<?php

namespace App\Services;

use DB;

use App\Models\MealRecord;
use App\Repositories\MealRepository;

class MealService
{

    protected $mealRepository;

    public function __construct(MealRepository $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }

    public function store(array $inputs): MealRecord
    {
        try {

            DB::beginTransaction();

            $meal = $this->mealRepository->store($inputs);

            DB::commit();

            return $meal;
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }

    public function getMealKindRecords(): array
    {
        $allRecords = $this->mealRepository->getAll();

        $mealKindRecords = [];
        foreach($allRecords as $record){
            $mealKindRecords[$record->meal_date][] = $record->meal_kind;
        }

        return $mealKindRecords;
    }


    public function getMealRecord(string $date, string $meal_kind): array
    {
        $mealRecord = $this->mealRepository->getMealRecord($date, $meal_kind);

        $meal = [
            'id' => $mealRecord->id,
            'meal_date' => $mealRecord->meal_date,
            'meal_kind' => $mealRecord->meal_kind,
            'meal_menu' => $mealRecord->meal_menu,
            'meal_place' => $mealRecord->meal_place,
            'meal_shop_name' => $mealRecord->meal_shop_name,
            'meal_shop_price' => $mealRecord->meal_shop_price,
            'calorie_id' => $mealRecord->calorie_id
        ];

        return $meal;
    }


    public function getDateRecord(string $date): array
    {
        $dateRecords = $this->mealRepository->getDateRecord($date);

        $mealRecords = [];
        foreach($dateRecords as $record){
            $mealRecords[$record->meal_date][$record->meal_kind] = [
                'id' => $record->id,
                'meal_date' => $record->meal_date,
                'meal_kind' => $record->meal_kind,
                'meal_menu' => $record->meal_menu,
                'meal_place' => $record->meal_place,
                'meal_shop_name' => $record->meal_shop_name,
                'meal_shop_price' => $record->meal_shop_price,
                'calorie_id' => $record->calorie_id
            ];
        }

        return $mealRecords;
    }
        public function getMealDate(int $id): string
    {

        $mealRecord = $this->mealRepository->getMealRecordById($id);

        return $mealRecord->meal_date;
    }


    public function update(array $inputs, int $id): int
    {
        try {

            DB::beginTransaction();

            $meal = $this->mealRepository->update($inputs, $id);

            DB::commit();

            return $meal;
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }

    public function destroy(int $id): int
    {
        try {

            DB::beginTransaction();

            $meal = $this->mealRepository->destroy($id);

            DB::commit();

            return $meal;
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }




}
