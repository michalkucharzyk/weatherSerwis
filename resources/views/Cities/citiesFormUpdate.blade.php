@extends('.layout')

@section('title', 'Add Cities')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <form action="http://127.0.0.1:8000/cities/{{ $city->id }}" method="POST">
                @method('PUT')
                {{ csrf_field() }}
                <label for="city">{{__('labels.city')}}</label>
                <input type="text" name="city" id="city" placeholder="City" value="{{ $city->name }}" />
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if(session('errors'))
                    <h1>{{session('errors')}}</h1>
                @endif
                <button type="submit" class="btn-success" name="send">Send</button>
            </form>
        </div>
    </div>
@stop

