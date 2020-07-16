<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <form action="http://127.0.0.1:8000/cities/" method="post">
                    @method('POST')
                    {{ csrf_field() }}
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" placeholder="City" />
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if(session('errors'))
                        <h1>{{session('errors')}}</h1>
                    @endif
                    <button type="submit" name="send">Send</button>
                </form>
            </div>
        </div>
    </body>
</html>
