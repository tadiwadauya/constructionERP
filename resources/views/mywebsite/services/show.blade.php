@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $service->name }}</h1>
        <p>{{ $service->description }}</p>

        @if(is_array($service->image))
            <div class="row">
                @foreach($service->image as $image)
                    <div class="col-md-4">
                        <img src="{{ asset($image) }}" alt="Service Image" width="300">
                    </div>
                @endforeach
            </div>
        @else
            <div>
                <img src="{{ asset($service->image) }}" alt="Service Image" width="300">
            </div>
        @endif
    </div>
@endsection