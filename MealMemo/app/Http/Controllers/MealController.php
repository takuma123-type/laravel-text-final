<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MealStoreRequest;

use App\Services\MealService;

use App\Http\Requests\MealUpdateRequest;

class MealController extends Controller
{

    protected $mealService;

    public function __construct(MealService $mealService)
    {
        $this->mealService = $mealService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($date = null)
    {
        //echo __FUNCTION__;
        //echo __CLASS__;

        var_dump($date);

        echo "<hr>";

        $today_year = date("Y");
        $today_month = date("m");
        $today_day = date("d");

        if (!is_null($date)){
            list($today_year, $today_month, $today_day) = explode("-", $date);
        }
        
        $_days = [];
        $days = array_pad($_days,42,"<br>");

        $thisMonthFirstDay = $today_year . "-" . $today_month . "-01";
        $thisMonthFirstDay_unix = strtotime($thisMonthFirstDay);
        $start = date("w", $thisMonthFirstDay_unix);

        $thisMonthEndDay = date("t", $thisMonthFirstDay_unix);

        foreach ($days as $dayno=>$day){
            if ($dayno >= $start && $dayno < ($start + $thisMonthEndDay)){
                $days[$dayno] = sprintf("%02d", ($dayno - $start + 1));
            }
        }

        $youbi = ['日', '月', '火', '水', '木', '金', '土'];


        //-------------レコード取得
        $mealKindRecords = $this->mealService->getMealKindRecords();
        //-------------

/*
        echo $today_year;
        echo "<br>";
        echo $today_month;
        echo "<br>";
        echo $today_day;
        echo "<hr>";
        
        echo $start;
        echo "<hr>";

        echo $thisMonthEndDay;
        echo "<hr>";

        print_r($days);
*/
        return view('meal.index',
        [
            'year' => $today_year,
            'month' => $today_month,
            'days' => $days,
            'youbi' => $youbi,
            'mealKindRecords' => $mealKindRecords
        ]);
;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealStoreRequest $request)
    {
        $this->mealService->store($request->validated());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $dateRecord = $this->mealService->getDateRecord($date);

        return view('meal.show',
        [
            'date' => $date,
            'dateRecord' => $dateRecord
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date, $meal_kind)
    {

        $meal = $this->mealService->getMealRecord($date, $meal_kind);

        return view('meal.edit', [
            'meal' => $meal
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MealUpdateRequest $request, $id)
    {

        $this->mealService->update($request->validated(), $id);
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->mealService->destroy($id);
        return redirect('/');
    }
}
