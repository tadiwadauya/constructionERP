@extends('layouts.app')
@section('template_title')
   Website-Management
@endsection
@section('template_fastload_css')
@endsection
@section('content')
    <div class="container">
            <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">Services</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
              <li class="breadcrumb-item active">Services</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title"> Services</h1>
                           
                        <div class="float-right">
                            <a href="{{ route('mywebsite.services.create') }}" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->name }}</td>
                                    <td>
                                        @if(is_array($service->description))
                                            @foreach ($service->description as $part)
                                                {!! is_array($part) ? implode(' ', $part) : $part !!}
                                            @endforeach
                                        @else
                                            {!! $service->description !!}
                                        @endif
                                    </td>
                                   <td>@php
                                        $images = $service->image;
                                        $lastImage = null;

                                        if (is_array($images) && count($images) > 0) {
                                            $lastImage = end($images);
                                        }

                                @endphp
                                    @if(is_array($service->image) && count($service->image) > 0)
                                        <img src="@if ($lastImage)
                                            {{ asset($lastImage) }}
                                        @endif" alt="service Image" width="100">
                                    @else
                                        <img src="{{ asset($service->image) }}" alt="service Image" width="100">
                                    @endif
                                </td>
                                    <td>
                                        <a href="{{ route('mywebsite.services.edit', $service->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i>Edit</a>
                                        <a href="{{ route('mywebsite.services.show', $service->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye-alt"></i>Show</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection