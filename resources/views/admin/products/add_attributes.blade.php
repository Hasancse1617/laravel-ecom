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
              <li class="breadcrumb-item active">Products Attributes</li>
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
        <form  method="post" action="{{ url('admin/add-attributes/'.$productData['id']) }}" name="attributeForm" id="attributeForm" enctype="multipart/form-data">
	        @csrf
	        <div class="card card-default">
	          <div class="card-header">
	            <h3 class="card-title">{{ $title }}</h3>

	            <div class="card-tools">
                <a href="{{ url('admin/products') }}" style="max-width: 150px; float: right; display: inline-block;" title="" class="btn btn-block btn-success">Products List</a>
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
	                    <div class="field_wrapper">
          						    <div>
          						        <input type="text" id="size" name="size[]" value="" placeholder="Size" style="width: 110px;" required="" />
          						        <input type="text" id="sku" name="sku[]" value="" placeholder="SKU" style="width: 110px;" required="" />
          						        <input type="number" id="price" name="price[]" value="" placeholder="Price" style="width: 110px;" required="" />
          						        <input type="number" id="stock" name="stock[]" value="" placeholder="Stock" style="width: 110px;" required="" />
          						        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
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
	            <button type="submit" class="btn btn-primary">Add Attributes</button>
	          </div>
	        </div>
        </form>

       <form id="editAttributeForm" name="editAttributeForm" method="post" action="{{ url('admin/edit-attributes/'.$productData['id']) }}">@csrf
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Added Products Attributes</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="products" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>            
                <th>Size</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
             @foreach($productData['attributes'] as $attribute)
              <tr>
              	<input style="display: none;" type="text" name="attrId[]" value="{{ $attribute['id'] }}">
                <td>{{ $attribute['id'] }}</td>
                <td>{{ $attribute['size'] }}</td>
                <td>{{ $attribute['sku'] }}</td>
                <td>
                    <input type="number" name="price[]" value="{{ $attribute['price'] }}" required="">
                </td>
                <td><input type="number" name="stock[]" value="{{ $attribute['stock'] }}" required=""></td>
                <td>
                	@if($attribute['status'] == 1)
                	  <a class="updateAttributesStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)">Active</a>
                	@else
                	  <a class="updateAttributesStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)">Inactive</a>
                	@endif
                	&nbsp;&nbsp;&nbsp;&nbsp;
                	<a title="Delete Attribute" class="confirmDelete" record="attribute" recordid="{{ $attribute['id'] }}" href="javascript:void(0)" title=""><i class="fas fa-trash"></i></a> 
                </td>
              </tr>
            @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Attribute</button>
          </div>
        </div>
      </form>

      </div><!-- /.container-fluid -->
    </section>

  </div>


@endsection