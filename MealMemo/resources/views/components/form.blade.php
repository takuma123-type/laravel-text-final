@php
    if (isset($meal)){
        $submit_url = "/meal/" . $meal['id'] . "/update";
    }else{
        $submit_url = "/meal/store";
    }
@endphp

<form method="post" action="{{ url($submit_url) }}">

    @csrf

    <div class="row">
        <div class="col-md-3 h5">
            食事した日付

            @empty($meal)
                <span class="text-danger h6">【必須】</span>
            @endempty

        </div>

        <div class="col-md-9">
            @isset($meal)
                <span class="h5">{{ $meal['meal_date'] }}</span>
                <input type="hidden" name="meal_date" value="{{ $meal['meal_date'] }}" />
            @else
                <input type="date" name="meal_date" class="form-control" />
                @include('components.input-error', ['errors' => $errors->get('meal_date')])
            @endisset
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 h5">
            食事の種別

            @empty($meal)
                <span class="text-danger h6">【必須】</span>
            @endempty

        </div>

        <div class="col-md-9">

            @isset($meal)
                @php $meal_kind = [1 => '朝食', 2 => '昼食', 3 => '夕食']; @endphp
                <span class="h5">{!! $meal_kind[$meal['meal_kind']] !!}</span>
                <input type="hidden" name="meal_kind" value="{{ $meal['meal_kind'] }}" />
            @else
                <div class="form-group my-2">

                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input"
                        name="meal_kind" id="meal_kind1" value="1">
                        <label class="form-check-label" for="meal_kind1">朝食</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input"
                        name="meal_kind" id="meal_kind2" value="2">
                        <label class="form-check-label" for="meal_kind2">昼食</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input"
                        name="meal_kind" id="meal_kind3" value="3">
                        <label class="form-check-label" for="meal_kind3">夕食</label>
                    </div>

                    @include('components.input-error', ['errors' => $errors->get('meal_kind')])
                </div>
            @endisset

        </div>
    </div>

    <div class="row">
        <div class="col-md-3 h5">
            食事メニュー
            <span class="text-danger h6">【必須】</span>
        </div>

        <div class="col-md-9">
            <input type="text" name="meal_menu" class="form-control"
            @isset($meal) value="{{ $meal['meal_menu'] }}" @endisset
            />
            @include('components.input-error', ['errors' => $errors->get('meal_menu')])
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 h5">
            食事した場所
            <span class="text-danger h6">【必須】</span>
        </div>

        <div class="col-md-9">

            @php
                $check0 = "";
                $check1 = "";
                if (isset($meal)){
                    if ($meal['meal_place'] == 0){
                        $check0 = "checked";
                    }else{
                        $check1 = "checked";
                    }
                }
            @endphp

            <div class="form-group my-2">

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input"
                    name="meal_place" id="meal_place0" value="0"
                    {{ $check0 }}
                    >
                    <label class="form-check-label" for="meal_place0">自宅</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input"
                    name="meal_place" id="meal_place1" value="1"
                    {{ $check1 }}
                    >
                    <label class="form-check-label" for="meal_place1">お店</label>
                </div>

                @include('components.input-error', ['errors' => $errors->get('meal_place')])
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 h5">
            食事したお店の名前
        </div>

        <div class="col-md-9">
            <input type="text" name="meal_shop_name" class="form-control"
            @isset($meal) value="{{ $meal['meal_shop_name'] }}" @endisset
            />
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 h5">
            食事の値段
        </div>

        <div class="col-md-9">
            <input type="number" name="meal_shop_price" class="form-control"
            @isset($meal) value="{{ $meal['meal_shop_price'] }}" @endisset
            />
        </div>
    </div>

    <div class="row my-4">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">登録する</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">戻る</a>
        </div>
    </div>

</form>