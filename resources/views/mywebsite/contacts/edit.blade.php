<!-- edit.blade.php -->

@extends('layouts.app')
@section('template_title')
    Website Management
@endsection
@section('content')
    <div class="container">
        <h1>Edit sectors you contact in:    
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                    << Return Back
            </a>
        </h1>
        <form action="{{ route('mywebsite.contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $contact->name }}" >
            </div>

                <div class="form-group">
                <label for="name">email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $contact->email }}" >
            </div>
                <div class="form-group">
                <label for="phonenumber">phonenumber</label>
                <input type="phonenumber" name="phonenumber" id="phonenumber" class="form-control" value="{{ $contact->phonenumber }}" >
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="summernote" class="form-control" required>{{ $contact->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="current_image">Current Image</label><br>
                <img src="{{ asset($contact->image) }}" alt="Current contact Image" width="200">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection