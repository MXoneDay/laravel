<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
@php use App\Http\Controllers\RacesController; @endphp
@php use App\Race; @endphp
<!-- Content-->
<section>
    <div class="container">
        <canvas id="drivers" width="400" height="400"></canvas>
    </div>
</section>

<!-- JavaScript-->
<script>
let js_labels= [@php echo RacesController::create_labels($race_id); @endphp];

var ctx = document.getElementById('drivers').getContext('2d');
var drivers = new Chart(ctx, {
    type: 'line',
    data: {
        labels: js_labels,
        datasets: [
            @php 
            foreach($drivers_linechart as $data){
                $name = $data['name'];
                $data_points = [];
                $team_color = $data['team_color'];

                for($i = 1; $i <= $race_id; $i++)
                {
                    $grand_prix= Race::select('*')->where('id', $i)->first();
                    $data_points[] = $data[$grand_prix->code];
                }
                
                $js_data_points = '"'.implode('", "', $data_points).'"';
                Echo 
                "{
                    label:\"$name\",                                      
                    data:[$js_data_points],
                    fill:true,
                    borderColor:\"rgb($team_color)\",
                    lineTension:0.1
                }, "
                ;
            }
            @endphp
            ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>