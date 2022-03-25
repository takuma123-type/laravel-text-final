<table class='table table-bordered'>

    <tr class='bg-primary text-white text-center'>
        <td>meal_kind</td>
        @foreach ($columns as $col)
            <td>{{ $col }}</td>
        @endforeach
        <td>icon</td>
    </tr>

    @for ($i=1; $i<=3; $i++)
        <tr>

            <td>{!! $meal_kind[$i] !!}</td>

            @foreach ($columns as $col)
                <td>
                    @isset($dateRecord[$date][$i][$col])

                        @switch($col)
                            @case("meal_place")
                                {!! $meal_place[$dateRecord[$date][$i]['meal_place']] !!}
                                @break

                            @default
                                {{ $dateRecord[$date][$i][$col] }}
                                @break

                        @endswitch

                    @else
                        -
                    @endisset
                </td>
            @endforeach

            <td class="icon_td text-center">
                @isset($dateRecord[$date][$i])
                    @php $edit_url = "/meal/$date/$i/edit"; @endphp
                    <a href="{{ url($edit_url) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    <i class="fas fa-trash-alt text-primary"
                    onClick="javascript:delete_alert({!! $dateRecord[$date][$i]['id'] !!});"
                    ></i>

                @endisset
            </td>

        </tr>
    @endfor

</table>

<style type="text/css">
.icon_td {width: 70px;}
</style>