<section>
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
</section>  