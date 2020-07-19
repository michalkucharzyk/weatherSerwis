<div class="container-weather">
    @forelse  ($data as $item)
        @include('weatherCityRow')
    @empty
        <div class="alert alert-primary" role="alert">
                <p>{{__('labels.no_cities')}}</p>
        </div>
    @endforelse
</div>