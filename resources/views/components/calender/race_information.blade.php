@php use App\Http\Controllers\ResultsController; @endphp
<!--    Functie die kaarten aanmaakt waarin race informatie word weergeven 
        Dit bevat de dag in het volgende format 9 Augustus 2020 en de grand prix naam met een afbeelding van de tracklayout
         Er komt een button in die alleen werkt zodra er voor die race ook data in de database zit 
        CONTROLLERS -> HTTP -> RACEDATESCONTROLLER -> GET_ALL_RACEDATES
-->
<!-- STYLING ER UIT HALEN IS TMP -->
<section>
    <div class ="container" >
    @if(count($grandprix) > 0)      <!-- Check of er data in de table race_dates zit-->
        @foreach ($grandprix as $grand_prix) <!-- Druk het volgende voor elke set data in race_dates af-->
            <div class="calendar-box">
                {{-- <div style="width:400px; height:300px; border : 5px black solid;"> --}}
                <h3>{{ \Carbon\Carbon::parse($grand_prix->date)->format('j F Y') }}</h3> <!-- format date van de DB naar een ander tijdsformat-->
                <h3>{{$grand_prix->name}}</h3>
                <!-- Momenteel zorgt deze voor erg veel downspeed niet alle fotos zijn er nog style ="max-width: 100%; max-height: 50%;"-->
                <div class="center">
                    <img src="{{$grand_prix->track_dir}}" id="calendar-img">
                </div>
                <!-- Functie die controleert of er bij race_dates.id een match is met race_results.id door te tellen hoeveel data er is bij race_results.id  -->
                <!-- Dynamische pagina's maken op basis van de results -->
                @if(ResultsController::get_count_for_single_race($grand_prix->id) > 0) 
                <div class="calendar-button">
                    <Button primary ><h3><a href="/results/{{$grand_prix->id}}" id="full-race-results-link">View race results</a></h3> </button>
                </div>
                @else() 
                <div class="calendar-button">
                    <Button secondary ><h3 id ="">Results coming soon</h3> </button>
                </div>
                @endif
            </div>           
        @endforeach              
    @endif
    </div>
</section>