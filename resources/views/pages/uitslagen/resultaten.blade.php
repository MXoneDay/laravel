@php use App\Http\Controllers\RacesController; @endphp
@extends('layouts.app')
@section('content')
    <div class='container'>
        <section>
            <h3>Resultaten van de</h3>
            <h2> {{ $gp_name->name }} </h2>
            <a href="/kalender" id="black-link"> < Terug naar de Kalender</a>
        </section>

        <section>
            <h3>Winnaar</h3>
            <h2> {{ $winner->firstname." ".$winner->lastname }} </h2>
            <h3>Snelste Race Ronde</h3>
            <h2> {{ $fastest_lap_by->firstname." ".$fastest_lap_by->lastname }} </h2>
        </section>
        
        {{-- <section>
            <h2> Results : </h2>
            <button primary>Race</button>
            <button primary>Qualifying</button>
            <button primary>Practice</button>
        </section> --}}

        <section>
            <div class="container">
                @if(count($results) > 0)
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Pos</th>
                                <th>Driver</th>
                                <th>Time</th>
                                <th>Fastest Lap</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $item)
                                <tr>
                                    <td> {{ $item->place }} </td>
                                    <td> {{ $item->firstname}} {{ $item->lastname}} </td>       
                                    <td> {{ $item->time }} </td>
                                        <!-- check of de waarde fastest_lap 0 is-->   
                                        @if( $item->fastest_lap == 0) 
                                            <td> {{ $item->fastest_lap_time }} </td> 
                                        @else
                                            <!-- check of de waarde fastest_lap anders is of terwijl 1 kleur deze dan roze met CSS-->
                                            <td style="color:#7F00FF;"> {{ $item->fastest_lap_time }} </td>     
                                        @endif    
                                    <td> {{ $item->points + $item->bonus_points - $item->penalty_points }} </td>
                                </tr>                     
                            @endforeach              
                        </tbody>
                    </table>
                @endif
            </div>
        </section>
    </div>
@endsection
