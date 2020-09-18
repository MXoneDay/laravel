@php use App\Http\Controllers\RaceDatesController; @endphp
@extends('layouts.app')

@section('content')

    <!-- Introductie Sectie van de Kalender -->
    @include('components.calender.introduction')
    <!-- Kalender Sectie -->
    @include('components.calender.race_information')
    <!-- TODO Footer -->


@endsection