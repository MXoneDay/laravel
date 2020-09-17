<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race; // Maakt het mogelijk Functies uit de Racedate Model te gebruiken
//use App\RaceResult; // Maakt het mogelijk Functies uit de Racedate Model te gebruiken

class RacesController extends Controller
{
    /** 
    * Functie toepasselijkere naam
    * Alles commenten in NL
    * Variablen correcte naamgeving
    */
    public static function get_race_id($currentTime){
        $amount_of_races = 22;      //Aantal Races op de Kalender
        $i = 0;                     //ID en Count waarde voor de loop, start met 1 omdat de Eerste ID in de DB met 1 start

        while($i <= $amount_of_races){
            //Verkrijgen van SQL Data van week dat gelijk staat aan $i en de week erna (+1)
            $get_currentWeek = Race::select('date')->where('id', $i)->get();
            $get_nextWeek = Race::select('date')->where('id', $i+1)->get();
            
            // Controleer of de huidige week ($i) uberhaupt waardes heeft zo ja proceed
            if(count($get_currentWeek) == 1){
                // Controleer of de huidige week ($i) uberhaupt waardes heeft zo ja proceed WELLICHT OVERBODIG
                if(count($get_nextWeek) == 1){
                    //
                    $query_currentWeek = Race::select('date')->where('id', $i)->first();
                    $scurrentWeek = $query_currentWeek->date;

                    if($currentTime > $scurrentWeek){ // Check of de huidige tijd groter is d                       
                        //
                        $query_nextWeek = Race::select('date')->where('id', $i+1)->first();
                        $nextWeek = $query_nextWeek->date;
                        //
                        if($currentTime < $nextWeek ){ 
                            return $i ;
                        }
                    }
                    // HIER MOET IETS KOMEN ALS IK VAN 0 NAAR 1 WIL SCLAEN
                }
            }
            elseif(count($get_currentWeek) == 0){
                if($i == 1){
                    $query_currentWeek = Race::select('*')->where('id', $i+1)->first();
                    $currentWeek = $query_currentWeek->date;    // Nodig voor de compare in de if statement

                    if($currentWeek > $currentTime){
                        if($i == 1){
                            //Word bereik wanneer de eerste race een later datum heeft dan de huidige tijd
                            return $i; 
                        }
                        else{
                            //Word volgens mij nooit bereikt doordat er geen waarden in $get_currentWeek zitten en $i gelijk is aan 0
                            echo "Test Current week = 0 en \$i <> 0";
                        }
                    }
                    else{ // Niks doen en de loop weer laten lopen
                    }
                }
            }
            
            //Word bereik wanneer de eerste race een later datum heeft dan de huidige tijd
            if($i == $amount_of_races){
                $query_currentWeek = Race::select('*')->where('id', $i)->first();
                $currentWeek = $query_currentWeek->date;      // Nodig voor de compare in de if statement

                if($currentWeek < $currentTime){
                    if($i == $amount_of_races){
                        //Word bereik wanneer de eerste race een later datum heeft dan de huidige tijd
                        return $i;
                    }else{ //Word volgens mij nooit bereikt doordat er geen waarden in $get_currentWeek zitten en $i gelijk is aan max_races
                    }
                }
                else{ // Niks doen en de loop weer laten lopen
                }
            }
            //Increment ID om te controleren of de volgende race wel in een slot past
            $i++; 
        } 
    }

    /** 
    * Omschrijving Toevoegen
    */
    public static function get_grand_prix_name($race_id, $i){
        $race_id = $race_id + $i;         //Het verhogen van de ID waardoor de week 1 doorschuift
        $amount_of_races = 22 + $i;     //Het aantal races moet een hoger zijn doordat het Race ID ook een hogerligt

        if($race_id == 0)                //ID kan geen 0 zijn, Opvangst voor een lege DB
        {               
            return "The Season is yet to start";
        }
        elseif(($race_id != 0 && $race_id < $amount_of_races) || ($race_id == $race_id + $i && $race_id == $amount_of_races))    
        {                                                                               //Een check om te zien of het een geldig race ID is (1 t/m $amount_of_races)             
            $get_upComingRace = Race::select('*')->where('id', $race_id)->first();   //Het halen van de de data van de race en het plaatsen in de varialble $get_upComingRace  
            $upComingRace = $get_upComingRace->name;                                    //Haalt de waarde uit de DB (RaceDate --> Race) (omdat er voorheen first is gebruikt 1 data waarde dus geen loop nodig)
            return $upComingRace;                                                       //Returnt de naam van de eerst volgende Grand Prix
        }
        elseif($race_id != $race_id + $i && $race_id == $amount_of_races)                   //Het Opvangen van het uit reach raken (Uitleg voor race_id == race_id +1 nog begrijpen)
        {
            return "grts";
        }
    }

    /** 
    * Omschrijving Toevoegen
    */
    public static function get_grand_prix_time($race_id, $i){
        $race_id = $race_id + $i;         //Het verhogen van de ID waardoor de week 1 doorschuift
        $amount_of_races = 22 + $i;     //Het aantal races moet een hoger zijn doordat het Race ID ook een hogerligt

        if($race_id == 0){               //ID kan geen 0 zijn, Opvangst voor een lege DB
            return null;
        }
        elseif(($race_id != 0 && $race_id != $amount_of_races) || ($race_id == $race_id + $i && $race_id == $amount_of_races))
        {
            $query_race_id = Race::select('*')->where('id', $race_id)->first();
            $date = \Carbon\Carbon::parse($query_race_id->date)->format('m/d/y H:i:s') ;
            return $date ;
            //https://stackoverflow.com/questions/40038521/change-the-date-format-in-laravel-view-page/40038594#40038594
            //https://www.php.net/manual/en/function.date.php
        }
        elseif($race_id != $race_id + $i && $race_id == $amount_of_races)      //Het Opvangen van het uit reach raken (Uitleg voor race_id == race_id +1 nog begrijpen)
        {
            return null;
        }
    }

    /** 
    * Conveteert een Array van GP afkortingen naar een string van grandprix afkortingen
    */
    public static function create_labels($race_id){
        for($i = 1; $i <= $race_id; $i++)
        {
            $grand_prix= Race::select('*')->where('id', $i)->first();
            $gp_labels[] = $grand_prix->code;
        }
        $js_labels = '"'.implode('", "', $gp_labels).'"';
        return $js_labels;
    }

}
