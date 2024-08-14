<!-- index.blade.php -->

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
                       posts
                    </h1>
                      
                       <div class="float-right">
                         <a href="{{ url('mywebsite/types') }}" class="btn btn-success btn-sm">Categories </a>
                             <a href="{{ route('mywebsite.posts.create') }}" class="btn btn-primary">Create </a>
         </div></div>
 <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                     <th>PostedBy</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($posts as $post)
                 @php 
                $user = \App\Models\User::find($post->created_by);
                $category = \App\Models\Type::find($post->category_id);
              
                @endphp

                    <tr>
                        <td>{{ $post->name }}</td>
                         <td> @if ($category)
                {{ $category->name }}
            @else
                category not found
            @endif</td>
                        <td>    @foreach (preg_split("/(<\/?[a-z]+>)/i", $post->description, -1, PREG_SPLIT_DELIM_CAPTURE) as $part)
                            @if (stripos($part, "<b>") !== false)
                                <b>{!! strip_tags($part, '<b>') !!}</b>
                            @elseif (stripos($part, "<p>") !== false)
                                <p>{!! strip_tags($part, '<p>') !!}</p>
                            @else
                                {!! $part !!}
                            @endif
                        @endforeach</td>
                         <td> @if ($user)
                {{ $user->first_name }} {{ $user->last_name }}
            @else
                User not found
            @endif</td>
                    <td><img src="{{ asset($post->image) }}" alt="post Image" width="100"></td>
                    <td>
                        <a href="{{ route('mywebsite.posts.edit', $post->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i>Edit</a>
                       <a href="{{ route('mywebsite.posts.show', $post->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye-alt"></i> Show</a>
                       <a href="{{ route('mywebsite.posts.destroy', $post) }}" onclick="event.preventDefault();
                        if (confirm('Are you sure you want to delete this post?')) { document.getElementById('delete-post-form-{{ $post->id }}').submit(); }" class="btn btn-danger btn-sm"> Delete</a>

                        <form id="delete-post-form-{{ $post->id }}" action="{{ route('mywebsite.posts.destroy', $post) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
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