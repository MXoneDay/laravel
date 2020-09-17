<table class="content-table">
    <thead>
        <tr>
            <th>Positie</th>
            <th>Driver</th>
            <th>Team</th>
            <th>Punten</th>
        </tr>
    </thead>
    <tbody>
        @php $driver_pos = 1 @endphp 
        @foreach($driver_standing as $item)
            <tr>
                <td>{{$driver_pos}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['team']}} </td>
                <td>{{$item['total_points']}}</td>
            </tr>
            @php $driver_pos++ @endphp 
        @endforeach          
    </tbody>
</table>
