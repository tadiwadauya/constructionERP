@extends('layouts.app')

@section('template_title')
    Portfolio
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
                            <li class="breadcrumb-item"><a href="{{ url('/mywebsite/portfolios') }}">Portifolio Home</a></li>
                            <li class="breadcrumb-item active">Portfolio</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Portfolio
                            <div class="float-right">
                                <a href="{{ url()->previous() }}" class="btn btn-default">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    &lt;&lt; Return Back
                                </a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mywebsite.portfolios.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_id"><a href=" {{ url('mywebsite/categories/create') }}" target="_blank">Category:</a></label>
                                <select name="category_id" class="form-control">
                                    <option>Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="images">Images:</label>
                                <input type="file" name="images[]" multiple class="form-control">
                            </div>
                            <div class="form-group">
                                <div id="additional-images"></div>
                                <button type="button" class="btn btn-primary" onclick="addInputFile()">Add Another Image</button>
                            </div>
                            <button type="submit" class="btn btn-info">Create</button>
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