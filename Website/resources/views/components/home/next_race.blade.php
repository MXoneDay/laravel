@php use App\Http\Controllers\RacesController; @endphp
<section>
    <div class="container flex f-jc-center f-ai-center">
        <div class="flex-item">
            <h2><span class="h-above">Next race</span> {{ RacesController::get_grand_prix_name($race_id, 1) }} </h2>
        </div>
        <div class="flex-item flex f-jc-center f-ai-center">
            <div class="dots dots_16x16 dots-left dots-bottom">
                @php $amount_of_dots = 35; @endphp
                @for($i = 0; $i <= $amount_of_dots; $i++)
                    <span class="dot"></span>
                @endfor
            </div>
            <!-- Timer Section -->
            <div class="flex-item box box-large bg-primary-red">
                <div class="timer">
                    <div>
                        <div class="t-value t-days"></div>
                        <div class="t-caption">days</div>
                    </div>
                    <div class="t-colon">:</div>
                    <div>
                        <div class="t-value t-hours"></div>
                        <div class="t-caption">hours</div>
                    </div>
                    <div class="t-colon">:</div>
                    <div>
                        <div class="t-value t-minutes"></div>
                        <div class="t-caption">minutes</div>
                    </div>
                    <div class="t-colon">:</div>
                    <div>
                        <div class="t-value t-seconds"></div>
                        <div class="t-caption">seconds</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const countDownDate = new Date("{{ RacesController::get_grand_prix_time($race_id, 1) }}").getTime();

    const setTime = (x) => {
        // Get today's date and time
        const now = new Date().getTime();

        // Find the distance between now and the count down date
        const distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        const values = {
            days: Math.floor(distance / (1000 * 60 * 60 * 24)),
            hours: Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
            minutes: Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
            seconds: Math.floor((distance % (1000 * 60)) / 1000),
        }

        // The output elements
        const elements = {
            days: document.querySelector('.t-days'),
            hours: document.querySelector('.t-hours'),
            minutes: document.querySelector('.t-minutes'),
            seconds: document.querySelector('.t-seconds'),
        }

        // Output the calculated values in the elements
        for (const key in elements) {
            if (elements.hasOwnProperty(key)) {
                const element = elements[key];

                if (!element || typeof values[key] !== 'number') {
                    continue;
                }

                // Prefix the value with '0', if below 10
                element.innerHTML = ('0' + values[key]).slice(-2);
            }
        }

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            console.log('Race started')
        }
    }

    setTime();

    // Update the count down every 1 second
    const x = setInterval(function() {
        setTime(x);
    }, 1000);
</script>

