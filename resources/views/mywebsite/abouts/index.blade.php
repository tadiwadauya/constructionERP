<!-- index.blade.php -->

@extends('layouts.app')
@section('template_title')
   Website-Management
@endsection
@section('template_fastload_css')
@endsection
@section('content')
    <div class="container">
                  <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Indelible Mark IT solutions</a>
            <h1 class="m-0">Portfolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
               <li class="breadcrumb-item active">About Us</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h4>  About Us</h4>
                        <br>
                         <div class="btn-group pull-right btn-group-xs">
         </div></div>
 <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Motto</th>
                    <th>Values</th>
                    <th>Motto</th>
                    <th>Vision</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($abouts as $about)
                <tr>
                    <td>{{ $about->motto }}</td>
                    <td>  <ul>
                            @foreach ($about->values as $value)
                            <li>{{ $value }}</li>
                                 @endforeach
                            </ul>
                        </td>
                    <td>{{ $about->mission }}</td>
                    <td>{{ $about->vision }}</td>
                    <td>    @foreach (preg_split("/(<\/?[a-z]+>)/i", $about->description, -1, PREG_SPLIT_DELIM_CAPTURE) as $part)
                            @if (stripos($part, "<b>") !== false)
                                <b>{!! strip_tags($part, '<b>') !!}</b>
                            @elseif (stripos($part, "<p>") !== false)
                                <p>{!! strip_tags($part, '<p>') !!}</p>
                            @else
                                {!! $part !!}
                            @endif
                        @endforeach</td>
                    <td><img src="{{ asset($about->image) }}" alt="about Image" width="100"></td>
                    <td>
                        <a href="{{ route('mywebsite.abouts.edit', $about->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i>Edit</a>
                       <a href="{{ route('mywebsite.abouts.show', $about->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye-alt"></i> Show</a>
                   
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