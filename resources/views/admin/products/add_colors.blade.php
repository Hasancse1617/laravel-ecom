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
              <li class="breadcrumb-item active">Products Colors</li>
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
         @if(Session::has('error_message'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
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
        <form  method="post" action="{{ url('admin/add-colors/'.$productData['id']) }}" name="colorForm" id="colorForm" enctype="multipart/form-data">
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
	              <div class="col-md-6">
	              	<div class="form-group">
	              		<label for="product_name">Product Name :</label>&nbsp; {{ $productData['product_name'] }}
	              	</div>	

	              	<div class="form-group">
	              		<label for="product_code">Product Code :</label> {{ $productData['product_code'] }}
	              	</div>

	              	<div class="form-group">
	              		<label for="product_color">Product Color :</label> {{ $productData['product_color'] }}
	              	</div>
                 </div>
	              
	              <div class="col-md-6">
	                <div class="form-group">
	                    @if($productData['main_image'])
                        <img style="width: 120px;margin-top: 5px;" src="{{ asset('images/product_images/small/'.$productData['main_image']) }}" alt="">
                      @else
                        <img style="width: 120px;margin-top: 5px;" src="{{ asset('images/product_images/small/no-image.jpg') }}" alt="">
                      @endif
	                 </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                    <div class="field_wrapper_colors">
          						    <div>
          						        <input type="text" id="colors" name="colors[]" value="" placeholder="Add Prodfuct Color" required="" />
                              <a href="javascript:void(0);" class="add_button_colors" title="Add field">Add</a>
          						    </div>
          						</div>
	                 </div>
	              </div>
	              <!-- /.col -->
	            </div>
	            <!-- /.row -->
	          </div>
	          <!-- /.card-body -->
	          <div class="card-footer">
	            <button type="submit" class="btn btn-primary">Add Colors</button>
	          </div>
	        </div>
        </form>

       <form id="editColorForm" name="editColorForm" method="post" action="{{ url('admin/edit-colors/'.$productData['id']) }}">@csrf
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Added Products Color</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="products" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>            
                <th>Color</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
             @foreach($productData['colors'] as $color)
              <tr>
                <input style="display: none;" type="text" name="colorId[]" value="{{ $color['id'] }}">
                <td>{{ $color['id'] }}</td>
                <td> <input type="text" name="colors[]" value="{{ $color['color'] }}"></td>
                <td>
                	
                	&nbsp;&nbsp;&nbsp;&nbsp;
                	<a title="Delete Color" class="confirmDelete text-danger" record="color" recordid="{{ $color['id'] }}" href="javascript:void(0)" title=""><i class="fas fa-trash"></i></a> 
                </td>
              </tr>
            @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Color</button>
          </div>
        </div>
      </form>

      </div><!-- /.container-fluid -->
    </section>

  </div>


@endsection