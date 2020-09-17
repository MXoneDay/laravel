<section>
    <table class="content-table">
        <thead>
            <tr>
                <th>Positie</th>
                <th>Team</th>
                <th>Punten</th>
            </tr>
        </thead>
        <tbody>
            @php $team_pos = 1 @endphp 
            @foreach($constructors as $item)
                <tr>
                    @if($team_pos <= 10)
                        <td>{{$team_pos}}</td>
                        <td>{{$item['team']}}</td>
                        <td>{{$item['total_points']}}</td>
                    @endif
                </tr>
                @php $team_pos++ @endphp 
            @endforeach          
        </tbody>
    </table>
</section>
