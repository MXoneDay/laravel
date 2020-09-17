<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race; // Maakt het mogelijk Functies uit de Racedate Model te gebruiken
use App\Result; // Maakt het mogelijk Functies uit de Racedate Model te gebruiken
use App\Driver;
use App\Penalty;
use Carbon;

class DriversController extends Controller
{
    // //Betere naam verzinnen
    public static function show($driver_number){
        $currentTime = Carbon\Carbon::now();
        $race_id = RacesController::get_race_id($currentTime); 

        $driver = Driver::select('*')->where('driver_number', '=', $driver_number)->first();

        $participation_check = Result::select('*')->where([['race_id', '=', $race_id],['number', '=', $driver_number]])->count();
        $penalty_check = Penalty::select('*')->where('driver_number', '=', $driver_number)->count();


        $previous_result = Result::select('*')->where([['race_id', '=', $race_id],['number', '=', $driver_number]])->first();
        $grand_prix = Race::select('*')->where('id', '=', $race_id)->first();
        
        $points = Result::selectRaw('SUM(points+bonus_points-penalty_points)as points')->where('number', '=', $driver_number)->first();
        $amount_of_wins = Result::select('place')->where([['place', '=', 1],['number', '=', $driver_number]])->count();
        $best_finish = Result::select('place')->where('number', '=', $driver_number)->orderBy('place', 'ASC')->first();
        $amount_of_podiums = Result::select('place')->where([['place', '<=', 3],['number', '=', $driver_number]])->count();
        $top10_finishes = Result::select('place')->where([['place', '<=', 10],['number', '=', $driver_number]])->count();

        $amount_of_races = Result::select('*')->where('number', '=', $driver_number)->count();
        $sum_grid = Result::selectRaw('SUM(grid) as sum')->where('number', '=', $driver_number)->first();
        $sum_finish = Result::selectRaw('SUM(place) as sum')->where('number', '=', $driver_number)->first();
        $polepositions = Result::select('*')->where([['grid', '=', 1],['number', '=', $driver_number]])->count();
        $best_qualy = Result::select('grid')->where('number', '=', $driver_number)->orderBy('grid', 'ASC')->first();
        $amount_of_fastest_laps = Result::select('*')->where([['fastest_lap', '=', 1],['number', '=', $driver_number]])->count();

        $licence_points = Penalty::selectRaw('SUM(licence_points) as points')->where('driver_number', '=', $driver_number)->first();
        $warnings = Penalty::selectRaw('SUM(warning) as warnings')->where('driver_number', '=', $driver_number)->first();
        $penalties = Result::selectRaw('SUM(penalty_points) as points')->where('number', '=', $driver_number)->first();

        return view('pages.drivers.driver_profile')->with(compact('driver', 'previous_result', 'grand_prix', 'participation_check', 'penalty_check',
        'points', 'amount_of_wins', 'best_finish', 'amount_of_podiums', 'top10_finishes',
        'amount_of_races', "sum_grid", "sum_finish", "polepositions", "best_qualy", "amount_of_fastest_laps",
        "licence_points", "warnings", "penalties"
    ));
    }
}
