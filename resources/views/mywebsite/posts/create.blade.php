@extends('layouts.app')

@section('template_title')
    posts
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
                            <li class="breadcrumb-item"><a href="{{ url('/mywebsite/posts') }}">posts Home</a></li>
                            <li class="breadcrumb-item active">Add posts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add posts
                            <div class="float-right">
                                <a href="{{ url()->previous() }}" class="btn btn-default">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    &lt;&lt; Return Back
                                </a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mywebsite.posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                               <label for="category_id"> <a href="{{ url('mywebsite/types/create') }}" target="_blank" >Category </a></label>
                                <select name="category_id" class="form-control">
                                    <option>Select category</option>
                                    @foreach ($types as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="summernote" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control-file" required accept="image/*">
                            </div>
                            <input type="hidden" name="created_by" id="created_by" class="form-control" value="{{ \Illuminate\Support\Facades\Auth::user()->id" >
                          

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addValueButton = document.getElementById('add-value');
            const valuesContainer = document.getElementById('values-container');

            addValueButton.addEventListener('click', function() {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = 'values[]';
                input.classList.add('form-control');
                valuesContainer.appendChild(input);
            });
            
        });
    </script>
@endsection