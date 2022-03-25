@extends('layouts.meal')



@section('content')

<div class="container">

    <h1>ミールメモ（create）</h1>
    <hr>

    @include('components.form', ['meal' => null])

</div>

@endsection