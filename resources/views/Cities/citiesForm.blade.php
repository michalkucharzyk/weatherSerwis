@extends('.layout')

@section('title', 'Add Cities')

@section('content')
    <form action="@if($city) {{route('cities.update',['city' => $city->id])}} @else {{route('cities.store')}} @endif"
          method="post" class="shadow-lg p-3 mb-5 bg-white rounded">
        @if($city)
            @method('PUT')
        @else
            @method('POST')
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="city">{{__('labels.city')}}</label>
            <input type="text" class="form-control" id="city" name="city" aria-describedby="cityHelp"
                   @if($city) value="{{$city->name}}" @endif>
            <small id="cityHelp" class="form-text text-muted">{{__('messages.info_inert_city')}}</small>
        </div>
        @if(session('errors'))
            @foreach(session('errors')->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <button type="submit" class="btn btn-primary">
            @if($city)
                {{__('labels.update')}}
            @else
                {{__('labels.add')}}
            @endif
        </button>
    </form>
@stop

