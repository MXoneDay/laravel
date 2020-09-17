@php 
use App\Http\Controllers\RacesController;
use App\Penalty; 
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <h3> FIA Overzicht</h3>
        <h1> F1 2020 season </h1>
        <p> Een overzicht van alle penalties die zijn uitgedeeld door de FIA en/of raceleiding voor het overtreden van de regels gedurende een Grand Prix. </br>
            Een Coureur kan een wedstrijd ban worden opgelegd als hij/zij vijf of meer licentie punten in één seizoen behaald. </br>
            Het behalen van drie waarschuwingen leid ook tot één licentie punt. </br>
            Overige straffen zijn puntenmindering tijdens een Grand Prix of een tijdstraf afhankelijk van de ernst en situatie.
        </p>
    </div>

    <div class="container">
        <button onclick="show1()" primary> Overzicht </button>
        <button onclick="show2()" primary> Documenten </button>
    </div>   

    <div class="container">
        @php
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
            
            function array_sort($array)
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
            
            $sort_FIA = array_sort($FIA);
            array_multisort($sort_FIA["warning_meter"],SORT_DESC,$FIA); 

        @endphp 
    </div> 

    <div class="container">
        <div id="page-content">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Positie</th>
                        <th>Driver</th>
                        <th>Licentiepunten</th>
                        <th>Waarschuwingen</th>
                    </tr>
                </thead>
                <tbody>
                    @php $position = 1 @endphp 
                    @foreach($FIA as $item)
                        <tr>
                            <td>{{$position}} </td>
                            <td>{{$item['name']}} </td>
                            <td>{{$item['licence_points']}} </td>
                            <td>{{$item['warnings']}} </td>
                        </tr>
                        @php $position++ @endphp 
                    @endforeach      
                </tbody>
            </table>
        </div>
    </div>  
    

@endsection

<script>
    /* TMP het idee is er nu nog ff netjes */
    function show1()
    {
        document.getElementById('page-content').style.display='inline-block';
        document.getElementById('constructors-standing').style.display='none';

    }
  
    function show2()
    {
        document.getElementById('page-content').style.display='none';
        document.getElementById('constructors-standing').style.display='inline-block';
    }
  
  </script>