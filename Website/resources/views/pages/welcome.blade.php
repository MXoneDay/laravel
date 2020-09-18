@php use App\Http\Controllers\RaceDatesController; @endphp
@extends('layouts.app')
@section('content')
    <!-- Introduction Section-->
    <section>
        <div class="container">
            <div class="banner box box-large bg-primary-red">
                <h1>Formula One<br> Makkers Online Racing</h1>
                <p>Welkom bij het MOR Championship.<br> Dit is een F1 2020 online racing competitie.</p>
            </div>
        </div>
    </section>
    <!-- Next Race Section + Timer Section-->
    @include('components.home.next_race')

    <!-- Discord Section -->
    @include('components.home.discord_contact')

    <!-- Last Results Section -->
    <!-- Wat word de invulling voor afgaand aan een seizoen als deze sectie leeg is !-->
    @include('components.home.last_results')

    <!-- Button-->
    <section id="full-race-results">
        <button primary>
            <a href="/results/{{$race_id}}" id="full-race-results-link"> Full race results
        </button>
    </section>  

    <!-- Footer TODO -->
@endsection
