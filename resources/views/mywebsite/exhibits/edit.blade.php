@extends('layouts.app')

@section('template_title')
    Edit Exhibit
@endsection

@section('content')
    <div class="container">
        <h1>Edit Exhibit</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('mywebsite.exhibits.update', ['exhibit' => $exhibit->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $exhibit->title }}">
            </div>

            <div class="form-group">
                <label for="images">Images</label>
                <br>
                @foreach ($exhibit['images'] as $image)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="image_{{ $image['id'] }}" name="images_to_remove[]" value="{{ $image['id'] }}">
                        <label class="form-check-label" for="image_{{ $image['id'] }}">
                            <img src="{{ asset($image['path']) }}" alt="{{ $image['path'] }}" class="img-thumbnail" style="width: 100px; height: 100px;">
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="new_images">Add Images</label>
                <input type="file" class="form-control-file" id="new_images" name="images[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection