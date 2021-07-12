@extends('layouts.admin_layout.admin_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blogs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blogs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
         @if(Session::has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Blogs</h3>
                <a href="{{ url('admin/add-edit-blog') }}" style="max-width: 150px; float: right; display: inline-block;" title="" class="btn btn-block btn-success">Add Post</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="sections" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>            
                    <th>Author</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Tag</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 @foreach($blogs as $blog)
                  <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->author->name }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>
                      {{ Str::limit($blog->description, 50, $end='...') }}
                    </td>
                    <td width="15%">
                        @foreach($blog->category_id as $category)
                         <span class="badge badge-success">{{$category}}</span>
                        @endforeach
                    </td>
                    <td width="15%">
                        @foreach($blog->tag_id as $tag)
                         <span class="badge badge-success">{{$tag}}</span>
                        @endforeach
                    </td>
                    <td width="4%">
                    	@if($blog->status == 1)
                    	  <a class="updateBlogStatus" id="blog-{{ $blog->id }}" blog_id="{{ $blog->id }}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                    	@else
                    	  <a class="updateBlogStatus" id="blog-{{ $blog->id }}" blog_id="{{ $blog->id }}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                    	@endif  
                    </td>
                    <td>
                        <a href="{{ url('admin/add-edit-blog/'.$blog->id) }}" title=""><i class="fas fa-edit"></i></a>&nbsp;&nbsp;  
                        <!--<a href="{{ url('admin/delete-blog/'.$blog->id) }}" title="">Delete</a>  -->
                        <a class="confirmDelete" record="blog" recordid="{{ $blog->id }}" href="javascript:void(0)" title=""><i class="fas fa-trash"></i></a>  
                    </td>
                  </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection