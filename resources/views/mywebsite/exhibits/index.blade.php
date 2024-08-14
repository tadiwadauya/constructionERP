@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
                        <h1 class="m-0">Portfolio</h1>
                        
                           <a href="{{ url('mywebsite/exhibits/editor') }}" class="btn btn-primary btn-sm">{{ __('Manage Images') }}</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Galleries') }}</h4>
                            <div class="float-right">
                                <a href="{{ route('mywebsite.exhibits.create') }}">{{ __('Add Image') }}</a>
                            </div>
                        </div>
                        @if ($exhibits->isEmpty())
                            <p>{{ __('No images found.') }}</p>
                        @else
                            <div class="card-body">
                                <div>
                                    <div class="btn-group w-100 mb-2">
                                        <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                                        @foreach ($exhibits as $exhibit)
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="{{ $exhibit->title }}"> {{ $exhibit->title }} </a>
                                        @endforeach
                                    </div>
                                    <div class="mb-2">
                                        <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                                        <div class="float-right">
                                            <select class="custom-select" style="width: auto;" data-sortOrder>
                                                <option value="index"> Sort by Position </option>
                                                <option value="sortData"> Sort by Custom Data </option>
                                            </select>
                                            <div class="btn-group">
                                                <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                                                <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-container p-0 row">
                                        @foreach (collect($exhibits)->reverse() as $exhibit)
                                            @foreach (collect($exhibit['images'])->reverse() as $image)
                                                <div class="filtr-item col-sm-2" data-category="{{ $exhibit['title'] }}" data-sort="white sample">
                                                <a href="{{ asset($image['path']) }}" alt="{{ $image['path'] }}" data-toggle="lightbox" data-title="{{ $exhibit['title'] }} ">
                                                  
                                                    <img src="{{ asset($image['path']) }}" alt="{{ $image['path'] }}" class="img-fluid mb-2" alt="white sample"style="width: 150px; height: 150px;"/>
                                                    </a>
       
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection