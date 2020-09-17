@php use App\Http\Controllers\RacesController; @endphp
<div class='container'>
<section>
    <div class="container">
        <div class="flex-item">
            <h2><span class="h-above">Last race results</span> {{ RacesController::get_grand_prix_name($race_id, 0) }} </h2>
        </div>
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
                            <td> {{ $item->points + $item->bonus_points - $item->penalty_points }}  </td>
                        </tr>                     
                    @endforeach              
                </tbody>
            </table>
        @endif
    </div>
</section>