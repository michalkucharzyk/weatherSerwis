@extends('.layout')

@section('title', 'List Cities')
@push('scripts')
    <script src="{{ asset('js/weather.js')}}"></script>
@endpush
@section('content')
    <form>
        <div class="form-group">
            <label for="city">{{__('labels.select_city')}}</label>
            <select class="form-control" id="city">
                <option value="all">{{__('labels.all')}}</option>
                @foreach  ($data as $item)
                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
    </form>
    @include('weatherCitiesContainer')
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('.container').weather({
                ajax: {
                    'weather': '{{route('weather')}}'
                },
                handlers: {
                    'select': '#city',
                    'container': '.container-weather'
                },
            });
        });
    </script>
@stop

