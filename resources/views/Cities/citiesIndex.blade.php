@extends('.layout')

@section('title', 'List Cities')

@section('content')
    <table class="table" >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Id open Weather</th>
            <th scope="col">City</th>
            <th scope="col">Country</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse  ($dataDb as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->id_open_weather }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->country }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="/cities/{{$item->id}}/edit" class="btn btn-primary">Edit</a>
                        </div>
                        <form method="POST" action="/cities/{{$item->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger " value="Delete">
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <p>No Cities</p>
        @endforelse
        </tbody>
    </table>
    @if(session('errors'))
        <div class="alert alert-danger" role="alert">
            {{session('errors')}}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
@stop

