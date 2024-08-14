<!-- edit.blade.php -->

@extends('layouts.app')

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
               <li class="breadcrumb-item"><a href="{{ url('/mywebsite/portfolios') }}">Portifolio Home</a></li>
              <li class="breadcrumb-item active">Edit Portfolio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
        <h4>Edit Portfolio <div class="float-right">
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                &lt;&lt; Return Back
            </a>
        </div></h4>
       
        <form action="{{ route('mywebsite.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $portfolio->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description">{{ $portfolio->description }}</textarea>
            </div>
            <div class="form-group">
<label for="category_id"><a href=" {{ url('mywebsite/categories/create') }}" target="_blank">Category:</a></label>
    <select class="form-control" name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $portfolio->category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" class="form-control" name="images[]" multiple class="form-control">
            </div>
            <div class="form-group">
            <div id="additional-images">
            </div>
            <div class="form-group">
            <button type="button" class="btn btn-primary" onclick="addInputFile()">Add Another Image</button>
        </br>
            <div class="form-group">
                <label for="removed_images">Remove Images</label>
                @foreach ($portfolio->images as $image)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="removed_images[]" value="{{ $image->id }}">
                        <label class="form-check-label" for="removed_images[]">
                            <img src="{{ asset($image->image) }}" alt="Portfolio Image" style="max-width: 200px; max-height: 200px;">
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
     </div>
      </div>
       </div>
        </div>
    <script>
    function addInputFile() {
        const additionalImagesDiv = document.getElementById('additional-images');
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'images[]';
        additionalImagesDiv.appendChild(input);
    }
</script>
@endsection