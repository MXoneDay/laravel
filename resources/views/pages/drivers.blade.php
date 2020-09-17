@extends('layouts.app')

@section('content')
    <div class="container">
        <h3> Driver profiles</h3>
        <h1> F1 2020 season </h1>
        <p> Klik op een driver om de statistieken te zien die behaald zijn dit seizoen 
            zoals wie de driver heeft bestuurd, hoeveel punten die heeft hoeveel overwinningen, beste eind positie en meer
        </p>
    </div>

    <!-- Driver cards -->
    <div class="container">
        @foreach($drivers as $item)
        <a href="/driver_profile/{{$item->driver_number}}" id="black-link">
            <div class="driver-box">
                <div>
                    {{$item->team->name}} <!-- Team --></br>
                    {{"Charles LeGrec"}} <!-- OG driver zou moeten via DB en dan zou dat nog gemaakt moeten worden en word dat vervanger van race nummer--></br>
                    <!-- een streepje voor reminder dat er een css streepje kotm-->
                    {{"Driven by"}}<!-- een streepje voor reminder dat er een css streepje kotm--></br>
                    {{$item->firstname." ".$item->lastname}}</br>
                    
                    <img src="{{$item->img_dir}}" id="driver-img">
                </div>
            </div>
        </a>     
        @endforeach
    </div>   
@endsection