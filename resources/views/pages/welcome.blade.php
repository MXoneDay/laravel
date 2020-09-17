@php use App\Http\Controllers\RaceDatesController; @endphp
@extends('layouts.app')
@section('content')
        <!-- 
        ALGEMENE NOTITIES
            1) Moet er een variable file komen voor $currentTim etc zodat deze overal kan want  zie Hier maar ook Pagecontroller
            2) Ik werk nu met joins maar je zou met relatie defenties zonder kunnen in laravel (Zie Model en Controllers) 
                -> GEFIXT, sommige queries kunnen nu wel omgeschreven worden want joins zijn niet persee nodig
            3) Pagina's zoals de drivers heeft in page content swap je blijft op de zelfde pagina maar wil een andere grafiek zien
               Nu kan ik zelf geen anjer van JS/Jquery/Vue of iets dat ook maar in Laravel zit, maar ik weet wel dat efficenter is als dat daar in word gedaan dat ik met php
               iets ga lopen maken dus dat is misschien een dingetje voor Derk Jan of Demi om na te kijken ik heb de functies voor de pagina wel
            4) Kiezen van de charts https://canvasjs.com/javascript-charts/multi-series-area-chart/
            
               1) En filter bouwen op de driver posities wie komt op een positie gelijk aantal punten
               google dit na voor officeel
        -->
        <!-- https://projects.invisionapp.com/share/STVT43I2ZFD#/screens/403288050 -->
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

        <section id="full-race-results">
            <button primary>
                <a href="/results/{{$race_id}}" id="full-race-results-link"> Full race results
            </button>
        </section>  
@endsection
