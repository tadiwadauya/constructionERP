<!-- edit.blade.php -->

@extends('layouts.app')
@section('template_title')
    Website Management
@endsection
@section('content')
    <div class="container">
        <h1>Edit Testimonials:    
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                    << Return Back
            </a>
        </h1>
        <form action="{{ route('mywebsite.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $testimonial->name }}" >
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message"  class="form-control" required>{{ $testimonial->message }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="current_image">Current Image</label><br>
                <img src="{{ asset($testimonial->image) }}" alt="Current testimonial Image" width="200">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection