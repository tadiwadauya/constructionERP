<!-- index.blade.php -->

@extends('layouts.app')
@section('template_title')
   Website-Management
@endsection
@section('template_fastload_css')
@endsection
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">
                       Sectors We serve in</h1>
                      
                       <div class="float-right">
                             <a href="{{ route('mywebsite.serves.create') }}" class="btn btn-primary">Create </a>
         </div></div>
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
                @foreach($serves as $serve)
                <tr>
                    <td>{{ $serve->name }}</td>
                    <td>    @foreach (preg_split("/(<\/?[a-z]+>)/i", $serve->description, -1, PREG_SPLIT_DELIM_CAPTURE) as $part)
                            @if (stripos($part, "<b>") !== false)
                                <b>{!! strip_tags($part, '<b>') !!}</b>
                            @elseif (stripos($part, "<p>") !== false)
                                <p>{!! strip_tags($part, '<p>') !!}</p>
                            @else
                                {!! $part !!}
                            @endif
                        @endforeach</td>
                    <td><img src="{{ asset($serve->image) }}" alt="serve Image" width="100"></td>
                    <td>
                        <a href="{{ route('mywebsite.serves.edit', $serve->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i>Edit</a>
                       <a href="{{ route('mywebsite.serves.show', $serve->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye-alt"></i> Show</a>
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