@extends('.layout')

@section('title', 'List Cities')

@section('content')
    <form>
        <div class="form-group">
            <label for="city">Wybierz miasto</label>
            <select class="form-control" id="city">
                @foreach  ($data as $item)
                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
    </form>
    @forelse  ($data as $item)
        @include('weatherCity')
    @empty
        <p>No Cities</p>
    @endforelse
@stop

