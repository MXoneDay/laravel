<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use App\Driver;
use App\Race; // Maakt het mogelijk Functies uit de Racedate Model te gebruiken
use App\Result; 
use App\Team;
use App\Penalty;  
// NADENK OF DIT WEL DE METHODE IS HOE HET HOORT VAN DATA IN DE PAGINA"S PASSEN
// DUPLICATE FUNCTIE IN RESULTS EN PENALTIES (Sort) HOE MAAK IK DEZE GLOBAAL
// OP schonen van pages controller of opdelen in sub stukken per pagina zodat het overzichtelijker word
class PagesController extends Controller
{
    public function index(){
        //https://stackoverflow.com/questions/20110757/laravel-pass-more-than-one-variable-to-view
        $currentTime = Carbon\Carbon::now();
        $race_id = RacesController::get_race_id($currentTime); 

        $drivers = Driver::join('teams', 'team_id', '=', 'teams.id')->get('*');
    
        $results = Result::join('drivers', 'results.number', '=', 'drivers.driver_number')->join('teams', 'results.team_id', '=', 'teams.id')
                        ->where('results.race_id', $race_id)->orderBy('points', 'DESC')->limit(10)->get();

        return view('pages.welcome')->with(compact('race_id','drivers', 'results'));
    }

    public function regels(){
        return view('pages.regels');
    }

    public function kalender(){
        $grandprix = Race::select('*')->orderBy('id', 'ASC')->get();

        $currentTime = Carbon\Carbon::now();
        $race_id = RacesController::get_race_id($currentTime); 

        return view('pages.kalender')->with(compact('grandprix', 'race_id'));
    }

    public function uitslagen(){
        //Get Data From Database
        $drivers = Driver::select('*')->get();
        $teams = Team::select('*')->get();
        $results = Result::select('*')->get();
        $grandprix = Race::select('*')->orderBy('id', 'ASC')->get();

        //GLOBAAL MOET DEZE
        $currentTime = Carbon\Carbon::now();
        $race_id = RacesController::get_race_id($currentTime); 
        $amount_of_races = 22;

        //een Dataset (array) maken op basis van de resultaten uit de database (voor de coureurs)
        foreach($drivers as $driver){
            
            $id =           1 ; // intalisatie van de ID (timer)
            $points =       0 ; // intalisatie van de punten per race
            $total_points = 0 ; // intalisatie van de totale punten

            while($id <= $amount_of_races){
                //Een query die een resultaat van een race match, match met een driver op basis van ID 
                $check_for_data = Result::select('*')->where([['race_id', '=', $id],['number', '=', $driver->driver_number]])->get();
                //Check of er data in de query zit anders jump to ELSE
                if(count($check_for_data) != 0){
                    ////Een query die een resultaat van een race match, match met een driver op basis van ID 
                    $single_result = Result::select('*')->where([['race_id', '=', $id],['number', '=', $driver->driver_number]])->first();
                    // Telt de punten van een driver waarbij ook rekening word gehouden met fastest_lap (bonus) en strafpunten
                    $points = $single_result->points + $single_result->bonus_points - $single_result->penalty_points;
                }
                //
                else{
                    $points = 0;
                }
                // Bewaard de totale punten (B reset bij de nieuwe loop en update de oude $total_points waarde)
                $total_points = $total_points + $points; 
                // Zodra ID match met het aantal races zijn alle punten opgeteld
                if($id == $amount_of_races){
                    $total_points = $total_points + $points; // Print totale punten per persoon
                    
                    // Het aanmaken van een data set in array per driver
                    // Hier worden de totale punten in opgeslagen
                    // Dit kan wss eenvoudiger door SUM toe te passen op points+bonuspoints-penalty_points 
                    // Maar dit lukt mij niet in Eloquent dus heb ik de data overgezet in een multidemensionale array die ik kan sorten
                    $driver_standing[] = array( "name" => $driver->firstname." ".$driver->lastname , 
                                                "team" => $driver->team->name, 
                                                "driver_number" => $driver->driver_number, 
                                                "total_points"  => $total_points
                                            );
                }
                $id++; // Increment de race ID              
            }
            //Buiten de WHILE LOOP
        }

        //een Dataset (array) maken op basis van de resultaten uit de database (voor de coureurs)
        foreach($drivers as $driver){
    
            $id =           1 ; // intalisatie van de ID (timer)
            $points =       0 ; // intalisatie van de punten per race
            $total_points = 0 ; // intalisatie van de totale punten


            while($id <= $race_id){
                $check_for_data = Result::select('*')->where([['race_id', '=', $id],['number', '=', $driver->driver_number]])->get();
                if(count($check_for_data) != 0)
                {
                    $single_result = Result::select('*')->where([['race_id', '=', $id],['number', '=', $driver->driver_number]])->first();
                    $points = $single_result->points + $single_result->bonus_points - $single_result->penalty_points;
                }
                else
                {
                    $points = 0;
                }

                // Bewaard de totale punten (B reset bij de nieuwe loop en update de oude $total_points waarde)
                $total_points = $total_points + $points; 
                $gp = Race::select('*')->where('id', '=', $id)->first();
                
                if($id <= 1)
                {
                    $drivers_linechart[$driver->user_id]["name"] = $driver->firstname." ".$driver->lastname;
                    $drivers_linechart[$driver->user_id]["team_color"] = $driver->team->color_code;
                    $drivers_linechart[$driver->user_id][$gp->code] = $total_points; 
                }
                elseif($id > 1 && $id <= $race_id){
                    $drivers_linechart[$driver->user_id][$gp->code] = $total_points;  
                }
   
                $id++;
            }
        }
        //een Dataset (array) maken op basis van de resultaten uit de database (voor de Teams)
        foreach($teams as $team){

            $id =           1 ; // intalisatie van de ID (timer)
            $points =       0 ; // intalisatie van de punten per race
            $total_points = 0 ; // intalisatie van de totale punten

            while($id <= $amount_of_races){
                $check_for_data = Result::select('*')->where([['race_id', '=', $id],['team_id', '=', $team->id]])->get();

                foreach($check_for_data as $data){
                    $points = $data->points + $data->bonus_points - $data->penalty_points;
                    $total_points = $total_points + $points;
                }

                $id++;
                //echo $check_for_data ; //echo "</br>";
            }
            $constructors[] = array("team" => $team->name, "total_points"  => $total_points); 
        }

        //een Dataset (array) maken op basis van de resultaten uit de database (voor de coureurs)
        foreach($teams as $team){

            $id =           1 ; // intalisatie van de ID (timer)
            $points =       0 ; // intalisatie van de punten per race
            $total_points = 0 ; // intalisatie van de totale punten


            while($id <= $race_id){
                $check_for_data = Result::select('*')->where([['race_id', '=', $id],['team_id', '=', $team->id]])->orderBy('id', 'ASC')->get();

                if(count($check_for_data) != 0)
                {
                    $single_result = Result::select('*')->where([['race_id', '=', $id],['team_id', '=', $team->id]])->first();
                    $points = $single_result->points + $single_result->bonus_points - $single_result->penalty_points;
                }
                else
                {
                    $points = 0;
                }

                // Bewaard de totale punten (B reset bij de nieuwe loop en update de oude $total_points waarde)
                if(count($check_for_data) == 0)
                {
                    null;
                }
                elseif(count($check_for_data) == 1)
                {
                    $points = $data->points + $data->bonus_points - $data->penalty_points;
                    $total_points = $total_points + $points;  

                }
                elseif(count($check_for_data) == 2)
                {
                    foreach($check_for_data as $data)
                    {
                        $points = $data->points + $data->bonus_points - $data->penalty_points;
                        $total_points = $total_points + $points;
                    }
                }
                $gp = Race::select('*')->where('id', '=', $id)->first();
                
                if($id <= 1)
                {
                    $constructors_linechart[$team->id]["name"] = $team->name;
                    $constructors_linechart[$team->id]["team_color"] = $team->color_code;
                    $constructors_linechart[$team->id][$gp->code] = $total_points; 
                }
                elseif($id > 1 && $id <= $race_id){
                    $constructors_linechart[$team->id][$gp->code] = $total_points;  
                }
    
                $id++;
            }
        }
        // https://stackoverflow.com/questions/4414623/loop-through-an-array-php

        /* Roep de functie sort Array aan
        *  Zodat de nested arrays worden gesorteerd op key value pairs
        *  alle items van verschillende arrays hebben nu matchende ids waarop ze bij elkaar horen
        *  Test Code 
        *   print_r($driver_standing);
        *   echo "</br></br></br></br></br></br>";
        *   print_r($sort_drivers);
        */
        $sort_drivers = ResultsController::array_sort($driver_standing);
        $sort_teams = ResultsController::array_sort($constructors);

        
        //Variable die waarop gesorteerd word       
        $orderby = "total_points"; 
        
        //PHP build-in array sort voor het soorten van de data
        //https://www.php.net/manual/en/function.ksort.php
        array_multisort($sort_drivers[$orderby],SORT_DESC,$driver_standing);
        array_multisort($sort_teams[$orderby],SORT_DESC,$constructors);
        
        //Filter al het onnodige eruit
        return view('pages.uitslagen')->with(compact('constructors','driver_standing','drivers_linechart',
                                                    'constructors_linechart','grandprix', 'results', 'race_id'));
    }


    public function drivers(){
        $drivers = Driver::select('*')->get();
        return view('pages.drivers')->with(compact('drivers'));
    }

    public function fia(){
        $drivers = Driver::select('*')->get();
        $penalties = Penalty::select('*')->get();

        $currentTime = Carbon\Carbon::now();
        $race_id = RacesController::get_race_id($currentTime); 

        foreach($drivers as $driver){
                
            $id =           1 ; // intalisatie van de ID (timer)
            $total_licence_points = 0 ; // intalisatie van de punten per race
            $total_warnings = 0 ; // intalisatie van de totale punten

            while($id <= $race_id){
                $penalties_per_driver = Penalty::select('*')->where([['race_id', '=', $id],['driver_number', '=', $driver->driver_number]])->get();

                foreach($penalties_per_driver as $penalty){
                    $warning = $penalty->warning;
                    $total_warnings = $total_warnings + $warning;

                    $licence_point = $penalty->licence_points;
                    $total_licence_points = $total_licence_points + $licence_point;
                };

                $id++;
            }

            $warning_meter = $total_warnings + 10*($total_licence_points) ; 
            $FIA[] = array( "name" => $driver->firstname." ".$driver->lastname, 
                            "warnings"  => $total_warnings,
                            "licence_points"  => $total_licence_points,
                            "warning_meter"  => $warning_meter
            ); 

        }  
        
        $sort_FIA = PenaltiesController::array_sort($FIA);
        array_multisort($sort_FIA["warning_meter"],SORT_DESC,$FIA); 
    
        return view('pages.fia')->with(compact('penalties', 'drivers', "race_id", "FIA"));
    }

}