<div class="card mt-5 shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-header bg-primary text-white">
        <h2> {{ $item['name']}} </h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 col-md-3 text-center">
                <h6>{{__('labels.current_hours')}}</h6>
                {{$item['current_time']}}
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>{{__('labels.up_hours')}}</h6>
                {{$item['data_update']}}
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>{{__('labels.sunrise')}}</h6>
                {{$item['sunrise']}}
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>{{__('labels.sunset')}}</h6>
                {{$item['sunset']}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-md-3 text-center">
                <h6>{{__('labels.temp')}}</h6>
                {{$item['weather']['temp']}} &#8451;
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>{{__('labels.feels_like')}}</h6>
                {{$item['weather']['feels_like']}} &#8451;
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>{{__('labels.temp_min')}}</h6>
                {{$item['weather']['temp_min']}} &#8451;
            </div>
            <div class="col-6 col-md-3 text-center">
                <h6>{{__('labels.temp_max')}}</h6>
                {{$item['weather']['temp_max']}} &#8451;
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-6 col-md-2 text-center">
                <h6>{{__('labels.pressure')}}</h6>
                {{$item['weather']['pressure']}} hPa
            </div>
            <div class="col-6 col-md-2 text-center">
                <h6>{{__('labels.humidity')}}</h6>
                {{$item['weather']['humidity']}} %
            </div>
            <div class="col-6 col-md-2 text-center">
                <h6>{{__('labels.speed')}}</h6>
                {{$item['wind']['speed']}} km/h
            </div>
            <div class="col-6 col-md-2 text-center">
                <h6>{{__('labels.deg')}}</h6>
                {{$item['wind']['deg']}}
            </div>
            <div class="col-6 col-md-2 text-center">
                <h6>{{__('labels.clouds')}}</h6>
                <i class="fa fa-copy"></i>
                {{$item['clouds']}}
            </div>
        </div>
    </div>
</div>