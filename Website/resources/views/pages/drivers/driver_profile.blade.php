@php use App\Http\Controllers\RacesController; @endphp
@extends('layouts.app')
@section('content')

        <div class="container">
            <div class="profile-img-box">
                <img src=".{{$driver->img_dir}}" id="profile-img">
            </div>
            <div class="right">
                <a href="/drivers" id="black-link"> < Terug naar de Coureurs</a>
            </div>
            <div class="driver_info">
                <h3> {{ $driver->team->name  }} </h3>
                <h2> {{ $driver->firstname." ".$driver->lastname  }} </h2>
            </div>
        </div> 
    </section>

    <section class="bg-primary-white">
        <div class="row">
            <div class="column">
                <h3> Vorige Race</h3>
                <h2> {{ $grand_prix->name }}  </h2>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <h3> Punt(en) </h3>
                @if( $participation_check != 0)
                    <h2> {{ $previous_result->points + $previous_result->bonus_points - $previous_result->penalty_points }} </h2>
                @else 
                    <h2> 0 </h2>
                @endif
            </div>
            <div class="column">
                <h3> Eindpositie </h3>
                @if( $participation_check  != 0)
                    <h2> {{ $previous_result->place}} </h2>
                @else 
                    <h2> Did not Start </h2>
                @endif
            </div>
            <div class="column">
                <h3> Snelste Ronde </h3>
                @if( $participation_check  != 0)
                    <h2> {{ $previous_result->fastest_lap_time }} </h2>
                @else 
                    <h2> No Time </h2>
                @endif
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="column">
                    <h3> Statistieken</h3>
                    <h2> van het huidige Seizoen </h2>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="race-stats-box">
                        <h2> Score</h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Punten</td>
                                    <td>{{ $points->points}}</td>
                                </tr>
                                <tr>
                                    <td>Overwinningen</td>
                                    <td>{{ $amount_of_wins}} </td>
                                </tr>
                                <tr>
                                    <td>Beste Eindpositie</td>
                                    <td>{{ $best_finish->place}}</td>
                                </tr>
                                <tr>
                                    <td>Podium Finish</td>
                                    <td>{{ $amount_of_podiums}}</td>
                                </tr>
                                <tr>
                                    <td>Top 10 Finish</td>
                                    <td>{{ $top10_finishes}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="column">
                    <div class="race-stats-box">
                        <h2> Race </h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Aantal Deelnames</td>
                                    <td>{{$amount_of_races}}<td>
                                </tr>
                                <tr>
                                    <td>Gem. Startpositie</td>
                                    <td>{{$sum_grid->sum / $amount_of_races}} </td>
                                </tr>
                                <tr>
                                    <td>Gem. Eindpostie</td>
                                    <td>{{$sum_finish->sum / $amount_of_races}}</td>
                                </tr>
                                <tr>
                                    <td>Aantal Polepositions</td>
                                    <td>{{$polepositions}}</td>
                                </tr>
                                <tr>
                                    <td>Beste Kwalificatie</td>
                                    <td>{{$best_qualy->grid}}</td>
                                </tr>
                                <tr>
                                    <td>Aantal Snelste Race Rondes</td>
                                    <td>{{$amount_of_fastest_laps}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="column">
                    <div class="race-stats-box">
                        <h2> Straffen </h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Licentie punten</td>
                                    @if ($penalty_check != 0)
                                        <td>{{$licence_points->points}}</td>
                                    @else
                                        <td>0</td>
                                    @endif    
                                </tr>
                                <tr>
                                    <td>Waarschuwingen</td>
                                    @if ($penalty_check != 0)
                                        <td>{{$warnings->warnings}}</td>
                                    @else
                                        <td>0</td>
                                    @endif   
                                </tr>
                                <tr>
                                    <td>Strafpunten</td>
                                    <td>{{$penalties->points}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
