@php use App\Http\Controllers\RacesController; @endphp
@php use App\Http\Controllers\ResultsController; @endphp
<table class="content-table" class="detailed-table">
    <thead>
        <tr>
            <th>Pos</th>
            <th>Driver</th>
            @if(count($grandprix) > 0)      <!-- Check of er data in de table race_dates zit-->
                @foreach ($grandprix as $grand_prix) <!-- Druk het volgende voor elke set data in race_dates af-->
                    <th>{{$grand_prix->code}}</th>          
                @endforeach              
            @endif
            <th>Points</th>
        </tr>
    </thead>
    <tbody>      
        @php $positie = 1; @endphp 
        @foreach($driver_standing as $item)
        <tr>
            <td>{{$positie}}</td>
            <td>{{$item['name']}}</td>
            @foreach($grandprix as $grand_prix)
                    @php $result = ResultsController::get_driver_result($grand_prix->id, $item['driver_number']); @endphp
                    @php $status = ResultsController::get_driver_status($grand_prix->id, $item['driver_number']); @endphp
                    
                    @if($status == 'FIN')
                        @if( $result == 1)
                            <td class="td-first"> {{ $result }} </td>
                        @elseif( $result == 2)
                            <td class="td-second"> {{ $result }} </td>
                        @elseif( $result == 3)
                            <td class="td-third"> {{ $result }} </td>
                        @elseif( $result >= 4 && $result <= 10)
                            <td class="td-top10"> {{ $result }} </td>
                        @elseif( $result >= 11 && $result <= 20)
                            <td class="td-bot10"> {{ $result }} </td>
                        @endif
                    @elseif($status == 'DNF')
                        <td class="td-dnf"> {{ $status }} </td>
                    @elseif($status == 'DNS')
                        <td class="td-dns"> {{ $status }} </td>
                    @elseif($status == 'DSQ')
                        <td class="td-dsq"> {{ $status }} </td>
                    <!-- check current time zodat alle oude Null's DNS worden en nieuwe niet-->
                    @elseif($status == '')
                        {{-- @if (count($item[]) == 0) // Bedenken hoe ik een count maakt die controleerd of er waarden zijn voor geen enkele race misschien kan dit anders omdat de models linken
                            <td bgcolor="#E5E5E5"> hoi</td> --}}
                        @if ($grand_prix->id <= $race_id)
                            <td class="td-dns"> DNS </td>
                        @endif
                    @else
                        <!-- NULL / Vangnetje -->
                    @endif

                    @if($grand_prix->id > $race_id)
                        <td></td> 
                    @endif
            @endforeach
            <td>{{$item['total_points']}}</td>
        </tr>
        @php $positie++ @endphp 
        @endforeach
    </tbody>
</table>