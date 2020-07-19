<div class="container-weather">
    @forelse  ($data as $item)
        @include('weatherCityRow')
    @empty
        <p>{{__('labels.no_cities')}}</p>
    @endforelse
</div>