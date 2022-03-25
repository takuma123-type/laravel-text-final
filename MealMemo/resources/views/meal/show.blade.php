@extends('layouts.meal')



@section('content')

<div class="container">

    <h1>ミールメモ（show）</h1>
    <hr>

    <div class='lead my-2'>{{ $date }}</div>

    @php
        $meal_kind = [1 => '朝食', 2 => '昼食', 3 => '夕食'];
        $meal_place = ['自宅', 'お店'];

        $columns = ['meal_menu', 'meal_place', 'meal_shop_name',
            'meal_shop_price', 'calorie_id'];
    @endphp

    <div class="d-none d-md-block">
        @include('components.show-middle',
        [
            'date' => $date, 'dateRecord' => $dateRecord,
            'meal_kind' => $meal_kind, 'meal_place' => $meal_place,
            'columns' => $columns
        ])
    </div>

    <div class="d-block d-md-none">
        @include('components.show-small',
        [
            'date' => $date, 'dateRecord' => $dateRecord,
            'meal_kind' => $meal_kind, 'meal_place' => $meal_place,
            'columns' => $columns
        ])
    </div>

    <div class="mt-3">
        <a href="{{ url('/') }}" class="btn btn-secondary">戻る</a>
    </div>

</div>



<script type="text/javascript">
    function delete_alert(id){
        if(!window.confirm('本当に削除しますか？')){
            window.alert('削除処理をキャンセルしました。');
            return false;
        }

        location.href = "/MealMemo/meal/" + id + "/destroy";
    };
</script>

@endsection