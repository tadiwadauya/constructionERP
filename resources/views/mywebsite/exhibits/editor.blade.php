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
                        <h1 class="m-0">Manage Gallery</h1>
                          <a href="{{ url('mywebsite/exhibits') }}" class="btn btn-primary btn-sm">{{ __('Gallery') }}</a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/mywebsite/exhibits') }}">Gallary</a></li>
                            <li class="breadcrumb-item active">Manage Gallery</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title"> exhibits</h1>
                        <div class="float-right">
                            <a href="{{ route('mywebsite.exhibits.create') }}" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>Title</th>
                <th>Images</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exhibits as $exhibit)
                <tr>
                    <td>{{ $exhibit->title }}</td>
                    <td>
                        @foreach ($exhibit['images'] as $image)
                            <img src="{{ asset($image['path']) }}" alt="{{ $image['path'] }}" class="img-thumbnail" style="width: 100px; height: 100px;">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('mywebsite.exhibits.edit', $exhibit->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                    <form action="{{ route('mywebsite.exhibits.destroy', $exhibit->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                         </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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