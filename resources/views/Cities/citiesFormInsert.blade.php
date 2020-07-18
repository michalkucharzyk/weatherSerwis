@extends('.layout')

@section('title', 'Add Cities')

@section('content')
    <form action="http://127.0.0.1:8000/cities/" method="post" class="shadow-lg p-3 mb-5 bg-white rounded">
        @method('POST')
        {{ csrf_field() }}
        <div class="form-group">
            <label for="city">{{__('labels.city')}}</label>
            <input type="text" class="form-control" id="city" name="city" aria-describedby="cityHelp">
            <small id="cityHelp" class="form-text text-muted">{{__('messages.info_inert_city')}}</small>
        </div>
        @if(session('errors'))
            @foreach(session('errors')->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <button type="submit" class="btn btn-primary">{{__('labels.add')}}</button>
    </form>
@stop

