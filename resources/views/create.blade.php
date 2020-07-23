@extends('layouts.app')

@section('title', "Create " . Illuminate\Support\Str::of($route_name)->studly())

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col d-flex align-items-center">
            <a href="{{ route("$route_name.index") }}" class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M10.78 19.03a.75.75 0 01-1.06 0l-6.25-6.25a.75.75 0 010-1.06l6.25-6.25a.75.75 0 111.06 1.06L5.81 11.5h14.44a.75.75 0 010 1.5H5.81l4.97 4.97a.75.75 0 010 1.06z"></path></svg>
            </a>
            <h1>Create {{ Illuminate\Support\Str::of($route_name)->studly()->singular() }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <form method="POST" action="{{ route("$route_name.store") }}">
                @csrf
                @foreach ($inputs as $input)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="{{ $input['name'] }}">{{ Illuminate\Support\Str::of($input['name'])->studly() }}</span>
                        </div>
                        <input type="{{ $input['type'] }}" name="{{ $input['name'] }}" value="{{ old($input['name']) }}" class="form-control @error($input['name']) is-invalid @enderror" placeholder="{{ $input['name'] }}" aria-label="{{ $input['name'] }}" aria-describedby="{{ $input['name'] }}">
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection