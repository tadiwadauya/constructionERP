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
            <h1 class="m-0">posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
              <li class="breadcrumb-item active">posts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">  
                        <h1 class="card-title">
                            Edit posts: 
        </h1>
         <div class="float-right">
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                &lt;&lt; Return Back
            </a>
</div></div>
 <div class="card-body">
        <form action="{{ route('mywebsite.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $post->name }}">
            </div>
<div class="form-group">
    <select class="form-control" name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $portfolio->category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="summernote" class="form-control" required>{{ $post->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="current_image">Current Image</label><br>
                <img src="{{ asset($post->image) }}" alt="Current post Image" width="200">
            </div>

            @if(Auth::check())
                <input type="hidden" name="updated_by" value="{{ Auth::id() }}">
            @endif

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection