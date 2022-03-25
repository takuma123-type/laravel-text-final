@for ($i=1; $i<=3; $i++)
<div class="mb-3">

    @isset($dateRecord[$date][$i])
        <div class="bg-primary text-white">

            {!! $meal_kind[$i] !!}

            @php $edit_url = "/meal/$date/$i/edit"; @endphp
            <a href="{{ url($edit_url) }}" class="badge rounded-pill bg-info text-white ml-5 my-1">edit</a>

            <a href="javascript:void(0);" class="badge rounded-pill bg-danger text-white ml-5 my-1"
            onClick="javascript:delete_alert({!! $dateRecord[$date][$i]['id'] !!});"
            dd($dateRecord);
            >delete</a>

        </div>

        @foreach ($columns as $col)
            <div>

                @switch($col)
                    @case("meal_place")
                        {!! $meal_place[$dateRecord[$date][$i]['meal_place']] !!}
                        @break

                    @default
                        {{ $dateRecord[$date][$i][$col] }}
                        @break

                @endswitch

            </div>
        @endforeach
    @endisset

</div>
@endfor