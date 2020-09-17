@php use App\Http\Controllers\RaceDatesController; @endphp
@extends('layouts.app')

@section('content')
    <!-- https://projects.invisionapp.com/share/STVT43I2ZFD#/screens/403288831 -->
    <!-- Introductie Sectie van de Kalender -->
    @include('components.calender.introduction')
    <!-- Kalender Sectie -->
    @include('components.calender.race_information')

@endsection