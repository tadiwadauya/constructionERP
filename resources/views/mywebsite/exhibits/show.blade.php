@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('exhibit Details') }}</div>

                    <div class="card-body">
                        <h5>{{ __('Title') }}: {{ $exhibit->title }}</h5>

                        <div class="mt-4">
                            <h5>{{ __('Images') }}</h5>
                            @if ($exhibit->images->isEmpty())
                                <p>{{ __('No images found.') }}</p>
                            @else
                                <div class="row">
                                    @foreach ($exhibit->images as $image)
                                        <div class="col-md-4 mb-4">
                                            <img src="{{ asset('storage/images/' . $image['path']) }}" alt="{{ $exhibit->title }}" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('mywebsite.exhibits.index') }}" class="btn btn-secondary">{{ __('Back to exhibits') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection