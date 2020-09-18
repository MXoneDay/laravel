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