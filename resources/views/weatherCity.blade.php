<div class="card mt-5 shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-header bg-primary text-white">
        <h2> {{ $item['name']}} </h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 col-md-3 text-center">
                <h6>Aktualna godzina </h6>
                {{$item['current_time']}}
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>Data aktualizacji pogody</h6>
                {{$item['data_update']}}
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>Wschód słońca</h6>
                {{$item['sunrise']}}
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>Zachód słońca</h6>
                {{$item['sunset']}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-md-3 text-center">
                <h6>Temepratura:</h6>
                {{$item['weather']['temp']}} &#8451;
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>Temepratura odczuwalna:</h6>
                {{$item['weather']['feels_like']}} &#8451;
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>Temepratura minimaln:</h6>
                {{$item['weather']['temp_min']}} &#8451;
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>Temepratura maksymalna</h6>
                {{$item['weather']['temp_max']}} &#8451;
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-6 col-md-2 text-center">
                <h6>Cisnienie:</h6>
                {{$item['weather']['pressure']}} hPa
            </div>
            <div class="col-6 col-md-2 text-center">
                <h6>Wilgotność:</h6>
                {{$item['weather']['humidity']}} %
            </div>
            <div class="col-6 col-md-2 text-center">
                <h6>Prędkość wiatru:</h6>
                {{$item['wind']['speed']}} km/h
            </div>
            <div class="col-6 col-md-2 text-center">
                <h6>Kierunek wiatru:</h6>
                {{$item['wind']['deg']}}
            </div>
            <div class="col-6 col-md-2 text-center">
                <h6>Zamchmurzenie:</h6>
                <i class="fa fa-copy"></i>
                {{$item['clouds']}}
            </div>
        </div>
    </div>
</div>