@extends('layouts.meal')



@section('content')

<div class="container">

    <h1>ミールメモ（edit）</h1>
    <hr>

    @include('components.form', ['meal' => $meal])

</div>

@endsection