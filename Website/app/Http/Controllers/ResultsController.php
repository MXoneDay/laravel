<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race; // Maakt het mogelijk Functies uit de Racedate Model te gebruiken
use App\Result; // Maakt het mogelijk Functies uit de Racedate Model te gebruiken
use App\Driver;


class ResultsController extends Controller
{   
    // //Betere naam verzinnen
    public static function show($id){
        $results = Result::join('drivers', 'results.number', '=', 'drivers.driver_number')
                                    ->where('race_id', $id)->orderBy('results.id', 'ASC')->get();

        $winner = Result::join('drivers', 'results.number', '=', 'drivers.driver_number')           
                                    ->where('race_id', $id)->orderBy('results.id', 'ASC')->first();

        $fastest_lap_by = Result::join('drivers', 'results.number', '=', 'drivers.driver_number')
                                    ->where([['race_id', '=', $id],['fastest_lap', '=', 1]])->orderBy('results.id', 'ASC')->first();
       
        $gp_name = Race::select('name')->where('id', '=', $id)->first();

        return view('pages.uitslagen.resultaten')->with(compact('results', 'winner', 'fastest_lap_by', 'gp_name'));
    }
    
    // //Betere naam verzinnen
    public static function get_count_for_single_race($id){
        $results = Result::select('*')->where('results.race_id', $id)->get();
        return count($results);
    }

    public static function get_driver_result($id, $driver){
        $position = Result::select('place')->where([['results.race_id', '=', $id],['number', '=', $driver]])->first();
        
        if($position['place'] != null) 
        {
            return $position['place'];
        }                 
        else
        {
            return null;
        }
    }

    public static function get_driver_status($id, $driver){
        $status = Result::select('status')->where([['results.race_id', '=', $id],['number', '=', $driver]])->first();
        
        if($status['status'] != null) 
        {
            return $status['status'];
        }                 
        else
        {
            return null;
        }
    }

    public static function array_sort($array)
    {
        foreach($array as $item)
        {
            foreach($item as $key=>$value)
            {
                if(!isset($sort[$key]))
                {
                    $sort[$key] = array();
                }
                $sort[$key][] = $value;
            }
        }
        return $sort;
    }
}
