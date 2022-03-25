@extends('layouts.meal')



@section('content')

<div class="container">

    <h1>ミールメモ（index）</h1>

    <a href="{{ url('/meal/create') }}" class="btn btn-primary">新規登録</a>

    <hr>

    <div class='lead my-2'>{{ $year }}-{{ $month }}</div>

    <table class='table table-bordered'>

        <tr class='bg-primary text-white text-center'>
            @foreach ($youbi as $yo)
                <td>{{ $yo }}</td>
            @endforeach
        </tr>

        @foreach ($days as $dayno=>$day)

            @if ($dayno % 7 == 0)
                <tr>
            @endif

            <td>
                @if ($day == "<br>")
                    <br>
                @else
                    {{ $day }}

                    @php $date = $year ."-". $month ."-". $day; @endphp
                    @isset($mealKindRecords[$date])
                    <div class="row">

                        <div class="col-md-4">
                        @if (in_array(1, $mealKindRecords[$date]))
                            <span class="text-success font-weight-bold">朝食</span>
                        @else
                            <span class="light-grey">朝食</span>
                        @endif
                        </div>

                        <div class="col-md-4">
                        @if (in_array(2, $mealKindRecords[$date]))
                            <span class="text-success font-weight-bold">昼食</span>
                        @else
                            <span class="light-grey">昼食</span>
                        @endif
                        </div>

                        <div class="col-md-4">
                        @if (in_array(3, $mealKindRecords[$date]))
                            <span class="text-success font-weight-bold">夕食</span>
                        @else
                            <span class="light-grey">夕食</span>
                        @endif
                        </div>

                    </div>

                    <div class="mt-2 float-end">
                        @php $detail_url = "/meal/$date/show"; @endphp
                        <a href="{{ url($detail_url) }}" class="badge rounded-pill bg-primary text-white">detail</a>
                    </div>

                    @endisset

                @endif
            </td>

            @if ($dayno % 7 == 6)
                </tr>
            @endif

        @endforeach
    </table>

</div>

<style>
.table td {width: calc(100% / 7);}
.light-grey {color:#dddddd;}
</style>

@endsection