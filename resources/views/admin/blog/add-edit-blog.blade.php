@extends('layouts.admin_layout.admin_layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catelogues</h1>
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
      	@if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
         @endif
         @if(Session::has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        
	        <div class="card card-default">
	          <div class="card-header">
	            <h3 class="card-title">{{ $title }}</h3>

	            <div class="card-tools">
	              <a href="{{ url('admin/blogs') }}" class="btn btn-success"><i class="fas fa-list"></i>&nbsp;&nbsp;Post List</a>
	            </div>
	          </div>
	          <!-- /.card-header -->
	         <form @if(empty($blogData['id'])) action="{{ url('admin/add-edit-blog') }}" @else action="{{ url('admin/add-edit-blog/'.$blogData['id']) }}" @endif method="post" name="categoryForm" id="AddPost" enctype="multipart/form-data">
	           @csrf
	          <div class="card-body">
	            <div class="row">
	              <div class="col-md-8">
                   
	              	<div class="form-group">
	              		<label>Title</label>
	              		<input type="text" @if(!empty($blogData['title'])) value="{{$blogData['title']}}" @else value="{{old('title')}}" @endif name="title" id="title" class="form-control" placeholder="Enter Post Title">
	              	</div>

                    <div class="form-group">
	                    <label for="exampleInputFile">Post Thumbnail (Image/Video/Audio)</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" class="custom-file-input" id="file" name="thumbnail" @if(!empty($blogData['thumbnail'])) value="{{$blogData['thumbnail']}}" @else value="{{old('thumbnail')}}" @endif>
	                        <label class="custom-file-label" for="thumbnail">Choose file</label>
	                      </div>
	                      <div class="input-group-append">
	                        <span class="input-group-text" id="">Upload</span>
	                      </div>
	                    </div>
	                    <div class="read-video @if($title=='Add Post') d-none @endif @if(!file_exists('videos/post_videos/'.@$blogData['thumbnail'])) d-none @endif">
	                    	<video id="" class="showFile" width="320" height="240" controls>
                              <source src="{{(!empty($blogData['thumbnail']))?url('videos/post_videos/'.$blogData['thumbnail']):url('images/admin_images/admin_photos/avatar.png')}}" type="video/mp4">
                           </video>
	                    </div>
                        <div class="read-image @if($title=='Add Post') d-none @endif @if(!file_exists('images/post_images/'.@$blogData['thumbnail'])) d-none @endif">
                        	<img  id="" class="mt-2 showFile"
                       src="{{(!empty($blogData['thumbnail']))?url('images/post_images/'.$blogData['thumbnail']):url('images/admin_images/admin_photos/avatar.png')}}"
                       alt="User profile picture" width="100px" height="100px">
                        </div>
	                    <div class="read-audio @if($title=='Add Post') d-none @endif @if(!file_exists('audios/post_audios/'.@$blogData['thumbnail'])) d-none @endif">
	                    	<audio id="" class="showFile" width="320" height="240" controls>
                              <source src="{{(!empty($blogData['thumbnail']))?url('audios/post_audios/'.$blogData['thumbnail']):url('images/admin_images/admin_photos/avatar.png')}}" type="video/mp4">
                           </audio>
	                    </div>

	                </div>

	                <div class="form-group">
	              		<label>Post Description</label>
	              		<textarea class="form-control" id="summernote" name="description" rows="5">@if(!empty($blogData['description'])) {{$blogData['description']}} @else {{old('description')}} @endif</textarea>
	              	</div>

                    <div class="card-footer">
			            <button type="submit" class="btn btn-primary">Submit</button>
			        </div>
			        
	              </div>
	              <div class="col-md-4">
                      <div class="category-area" style="padding-left: 50px">
                      	<h3>Categories</h3>
                      	<div class="categories overflow-auto pl-3" style="height: 100px; background-color: #dfdfdf;border-radius: 5px;">
  
                      		@foreach($categories as $category)
                              <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="category_id" name="category_id[]" value="{{ $category['id'] }}" @if(!empty($blogData['category_id'])) {{ (in_array(@$category['id'], $blogData['category_id']))? 'checked' :'' }} @endif>
                                  <label class="form-check-label">{{ $category['name'] }}</label><br>
                      		  </div>
                      		@endforeach
                      	  
                      	</div>
                      	<form action="{{ url('admin/add-post-category') }}" method="post" id="addCategory">
                      		@csrf
                      		<div class="form-group">
			              		<label>Category</label>
			              		<input type="text" class="form-control" name="name" placeholder="Enter Category">
			              	</div>
			              	<button type="submit" class="btn btn-primary">Add new Category</button>
                      	</form>
                      	&nbsp;
                      	<hr>
                      </div>
                      
                      <div class="tag-area" style="padding-left: 50px">
                      	<h3>Tags</h3>
                      	<div class="tags overflow-auto pl-3" style="height: 100px; background-color: #dfdfdf;border-radius: 5px;">
                      		@foreach($tags as $tag)
                              <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="tag_id" name="tag_id[]" value="{{ $tag['id'] }}"  @if(!empty($blogData['tag_id'])) {{ (in_array(@$tag['id'], $blogData['tag_id']))? 'checked' :'' }} @endif>
                                 <label class="form-check-label">{{ $tag['name'] }}</label><br>
                      		  </div>
                      		@endforeach
                      	</div>
                      	<form action="{{ url('admin/add-post-tag') }}" method="post" id="addTag">
                      		@csrf
                      		<div class="form-group">
			              		<label>Tag</label>
			              		<input type="text" class="form-control" name="name" placeholder="Enter Tag">
			              	</div>
			              	<button type="submit" class="btn btn-primary">Add new Tag</button>
                      	</form>
                      </div>
	              </div>
	            </div>
	          </div>
	          </form>
	        </div>
        

      </div><!-- /.container-fluid -->
    </section>

  </div>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<script type="text/javascript">
	$(document).ready(function () { 
	  $('#AddPost').validate({
	    rules: {
	      title: {
	        required: true,
	      },
	      "category_id[]": {
	      	required:true,
	      }, 
          "tag_id[]": {
          	required: true,
          }
	    },
	    messages: {
	      
	    },
	    errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	    },
	    highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	    }
	  });
	});
</script>

<script type="text/javascript">
	$(document).ready(function () { 
	  $('#addCategory').validate({
	    rules: {
	      name: {
	        required: true,
	      } 
	    },
	    messages: {
	      
	    },
	    errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	    },
	    highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	    }
	  });
	});
</script>
<script type="text/javascript">
	$(document).ready(function () { 
	  $('#addTag').validate({
	    rules: {
	      name: {
	        required: true,
	      } 
	    },
	    messages: {
	      
	    },
	    errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	    },
	    highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	    }
	  });
	});
</script>

@endsection