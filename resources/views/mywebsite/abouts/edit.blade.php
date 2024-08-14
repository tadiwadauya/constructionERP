<!-- edit.blade.php -->

@extends('layouts.app')
@section('template_title')
    Website Management
@endsection
@section('content')
    <div class="container">
         <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">Portfolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/mywebsite/abouts') }}">About Us Home</a></li>
              <li class="breadcrumb-item active">Edit About Us</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
        <h1>Edit About Us
            <div class="float-right">
              <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                 << Return Back
               </a>
             </div>
        </h1>
        <form action="{{ route('mywebsite.abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="motto">Motto</label>
        <input type="text" name="motto" id="motto" class="form-control" value="{{ $about->motto }}">
    </div>
 <div class="form-group" id="values-group">
                                <label for="values">Values</label>
                                @foreach ($about->values as $value)
                                    <div class="input-group mb-3">
                                        <input type="text" name="values[]" class="form-control" value="{{ $value }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-danger remove-value" type="button">&times;</button>
                                        </div>
                                    </div>
                                @endforeach
                                <button class="btn btn-primary add-value" type="button">Add Value</button>
                            </div>
    <div class="form-group">
        <label for="mission">Mission</label>
        <input type="text" name="mission" value="{{ $about->mission }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="vision">Vision</label>
        <input type="text" name="vision" id="vision" value="{{ $about->vision }}" class="form-control" >
    </div>
    <div class="form-group">
        <label for="tagline">Tagline</label>
        <input type="text" name="tagline" id="tagline" value="{{ $about->tagline }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="summernote" class="form-control" required>{{ $about->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="current_image">Current Image</label><br>
        <img src="{{ asset($about->image) }}" alt="Current about Image" width="200">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>
     </div>
      </div>
       </div>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
       $(document).ready(function() {
    $('.add-value').click(function() {
        var inputGroup = $('<div class="input-group mb-3"></div>');
        var input = $('<input type="text" name="values[]" class="form-control">');
        var removeBtn = $('<button class="btn btn-outline-danger remove-value" type="button">&times;</button>');

        removeBtn.click(function() {
            $(this).closest('.input-group').remove();
        });

        inputGroup.append(input);
        inputGroup.append(removeBtn);
        $('#values-group').append(inputGroup);
    });

    $(document).on('click', '.remove-value', function() {
        $(this).closest('.input-group').remove();
    });
});
    </script>
@endsection