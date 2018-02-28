@extends('app')
@section('slider')
    @include('partials.slider', ['sliders' => $sliders])
@endsection