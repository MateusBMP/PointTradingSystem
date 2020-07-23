@extends('layouts.app')

@section('title', "Show " . Illuminate\Support\Str::of($route_name)->studly())

@section('content')
    <div class="row">
        <div class="col d-flex align-items-center">
            <a href="{{ route("$route_name.index") }}" class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M10.78 19.03a.75.75 0 01-1.06 0l-6.25-6.25a.75.75 0 010-1.06l6.25-6.25a.75.75 0 111.06 1.06L5.81 11.5h14.44a.75.75 0 010 1.5H5.81l4.97 4.97a.75.75 0 010 1.06z"></path></svg>
            </a>
            <h1>Show {{ Illuminate\Support\Str::of($route_name)->studly()->singular() }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="{{ $collection->id }}">ID</span>
                </div>
                <input type="string" value="{{ $collection->id }}" class="form-control" aria-label="{{ $collection->id }}" aria-describedby="{{ $collection->id }}" disabled>
            </div>
            @foreach ($inputs as $input)
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="{{ $input['name'] }}">{{ Illuminate\Support\Str::of($input['name'])->studly() }}</span>
                    </div>
                    <input type="{{ $input['type'] }}" value="{{ $input['value'] }}" class="form-control" aria-label="{{ $input['name'] }}" aria-describedby="{{ $input['name'] }}" disabled>
                </div>
            @endforeach
            <div class="btn-group" role="group" aria-label="Actions">
                <a href="{{ route("$route_name.edit", [Illuminate\Support\Str::singular($route_name) => $collection->id]) }}" class="btn btn-warning" role="button" aria-pressed="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path></svg>
                    Edit
                </a>
                <form method="POST" action="{{ route("$route_name.destroy", [Illuminate\Support\Str::singular($route_name) => $collection->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.5 8a5.5 5.5 0 1111 0 5.5 5.5 0 01-11 0zM8 1a7 7 0 100 14A7 7 0 008 1zm3.25 7.75a.75.75 0 000-1.5h-6.5a.75.75 0 000 1.5h6.5z"></path></svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection