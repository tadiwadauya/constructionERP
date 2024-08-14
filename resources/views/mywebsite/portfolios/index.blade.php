@extends('layouts.app')
@section('template_title')
   Website | Portfolio
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
            <h1 class="m-0">Portfolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
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
                        <h1 class="card-title">Portfolios</h1>
 <div class="float-right">
        <a href=" {{ url('mywebsite/categories') }}" class="btn btn-success btn-sm">Categories</a>
        <a href="{{ route('mywebsite.portfolios.create') }}"class="btn btn-primary btn-sm">Create New Portfolio</a>
 </div>
  </div>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($portfolios as $portfolio)
          @php 
                $category = \App\Models\Category::find($portfolio->category_id);
                @endphp
            <tr>
                <td>{{ $portfolio->title }}</td>
                <td>{{ $portfolio->description }}</td>
                <td> @if ($category)
                {{ $category->name }}
            @else
                category not found
            @endif</td>
              <td> @if ($portfolio->images->count() > 0)
                @php
                    $lastImage = $portfolio->images->last();
                @endphp
                <img src="{{ asset($lastImage->image) }}" alt="Portfolio Image" width="100">
            @endif</td>
                <td>
                    <a href="{{ route('mywebsite.portfolios.show', $portfolio->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye-alt"></i>Show</a>
                    <a href="{{ route('mywebsite.portfolios.edit', $portfolio->id) }}"class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i>Edit</a>
                    <form action="{{ route('mywebsite.portfolios.destroy', $portfolio->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                       
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
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