<!-- edit.blade.php -->

@extends('layouts.app')
@section('template_title')
    Website Management
@endsection
@section('content')
    <div class="container">
        <h1>Edit sectors you serve in:    
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                    << Return Back
            </a>
        </h1>
        <form action="{{ route('mywebsite.serves.update', $serve->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $serve->name }}" >
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="summernote" class="form-control" required>{{ $serve->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="current_image">Current Image</label><br>
                <img src="{{ asset($serve->image) }}" alt="Current serve Image" width="200">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection