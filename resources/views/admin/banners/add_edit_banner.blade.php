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
              <li class="breadcrumb-item active">Banners</li>
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
        <form @if(empty($bannerdata['id'])) action="{{ url('admin/add-edit-banner') }}" @else action="{{ url('admin/add-edit-banner/'.$bannerdata['id']) }}" @endif method="post" name="bannerForm" id="bannerForm" enctype="multipart/form-data">
	        @csrf
	        <div class="card card-default">
	          <div class="card-header">
	            <h3 class="card-title">{{ $title }}</h3>

	            <div class="card-tools">
	              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
	            </div>
	          </div>
	          <!-- /.card-header -->
	          <div class="card-body">

	            <div class="row">
	              <div class="col-12 col-sm-6">
	              	<div class="form-group">
	                    <label for="image">Banner Image</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" class="custom-file-input" id="image" name="image">
	                        <label class="custom-file-label" for="image">Choose file</label>
	                      </div>
	                      <div class="input-group-append">
	                        <span class="input-group-text" id="">Upload</span>
	                      </div>
	                     
	                    </div>
	                    <div>Recommended Image Size : width: 1170px and Height: 480px</div>
	                    @if(!empty($bannerdata['image']))
                             <div style="height: 100px;">
                             	<img style="width: 50px;margin-top: 5px;" src="{{ asset('images/banner_images/'.$bannerdata['image']) }}" alt="">
                             	&nbsp;
                             	 <a class="confirmDelete" record="banner-image" recordid="{{ $bannerdata['id'] }}" href="javascript:void(0)" title="">Delete Image</a> 
                             	
                             </div>
	                      @endif
	                  </div>

	                  <div class="form-group">
	              		<label for="link">Banner Link</label>
	              		<input type="text" @if(!empty($bannerdata['link'])) value="{{$bannerdata['link']}}" @else value="{{old('link')}}" @endif name="link" id="link" class="form-control" placeholder="Enter Banner Link">
	              	</div>
	              </div>
	            </div>

	            <div class="row">
	             
	              <div class="col-md-6">

	              	<div class="form-group">
	              		<label for="title">Banner Title</label>
	              		<input type="text" @if(!empty($bannerdata['title'])) value="{{$bannerdata['title']}}" @else value="{{old('title')}}" @endif name="title" id="title" class="form-control" placeholder="Enter Banner Title">
	              	</div>
	              	<div class="form-group">
	              		<label for="alt">Banner Alternate Text</label>
	              		<input type="text" @if(!empty($bannerdata['alt'])) value="{{$bannerdata['alt']}}" @else value="{{old('alt')}}" @endif name="alt" id="alt" class="form-control" placeholder="Enter product Code">
	              	</div>	
	              	
	              </div>
	              <div class="col-md-6">

	              	<div class="form-group">
	              		<label>Sub Title</label>
	              		<input type="text" @if(!empty($bannerdata['subtitle'])) value="{{$bannerdata['subtitle']}}" @else value="{{old('subtitle')}}" @endif name="subtitle" id="subtitle" class="form-control" placeholder="Enter Banner Subitle">
	              	</div>
	              	<div class="form-group">
	              		<label>Button Text</label>
	              		<input type="text" @if(!empty($bannerdata['btn_text'])) value="{{$bannerdata['btn_text']}}" @else value="{{old('btn_text')}}" @endif name="btn_text" id="btn_text" class="form-control" placeholder="Enter Button Text">
	              	</div>	
	              	
	              </div>
	            </div>
	          </div>
	          <div class="card-footer">
	            <button type="submit" class="btn btn-primary">Submit</button>
	          </div>
	        </div>
        </form>

      </div><!-- /.container-fluid -->
    </section>

  </div>

<script type="text/javascript">
	
	$(document).ready(function () {
	  
	  $('#bannerForm').validate({
	    rules: {
	      title: {
	        required: true,
	      },
	      alt: {
	        required: true,
	      },
	      link: {
	        required: true,
	      },
	      subtitle:{
	      	required:true,
	      },
	      btn_text:{
	      	required:true,
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