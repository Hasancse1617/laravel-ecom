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
              <li class="breadcrumb-item active">Products</li>
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
        <form @if(empty($productData['id'])) action="{{ url('admin/add-edit-product') }}" @else action="{{ url('admin/add-edit-product/'.$productData['id']) }}" @endif method="post" name="productForm" id="productForm" enctype="multipart/form-data">
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
	                  <label for="category_id">Select Category</label>
	                  <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
	                    <option value="">Select</option>
	                    @foreach($categories as $section)
	                      <optgroup label="{{ $section['name'] }}"></optgroup>
                           @foreach($section['categories'] as $category)
                             <option value="{{ $category['id'] }}" @if(!empty(@old('category_id')) && $category['id']==@old('category_id')) selected="" @elseif(!empty($productData['category_id']) && $productData['category_id']==$category['id']) selected="" @endif>&nbsp;&nbsp;--&nbsp;&nbsp;{{ $category['category_name'] }} </option>
                             @foreach($category['subcategories'] as $subcategory)
                               <option value="{{ $subcategory['id'] }}" @if(!empty(@old('category_id')) && $subcategory['id']==@old('category_id')) selected="" @elseif(!empty($productData['category_id']) && $productData['category_id']==$subcategory['id']) selected="" @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{ $subcategory['category_name'] }} </option>
                             @endforeach
                           @endforeach
	                     @endforeach
	                  </select>
	                </div>

	                <div class="form-group">
	                  <label for="brand_id">Select Brand</label>
	                  <select name="brand_id" id="brand_id" class="form-control select2" style="width: 100%;">
	                    <option value="">Select</option>
	                    @foreach($brands as $brand)
	                     <option value="{{ $brand['id'] }}" @if(!empty($productData['brand_id']) && $productData['brand_id']==$brand['id']) selected="" @endif>{{ $brand['name'] }}</option>
	                     @endforeach
	                  </select>
	                </div>
	
	              </div>

	              <div class="col-md-6">

	              	<div class="form-group">
	              		<label for="product_name">Product Name</label>
	              		<input type="text" @if(!empty($productData['product_name'])) value="{{$productData['product_name']}}" @else value="{{old('product_name')}}" @endif name="product_name" id="product_name" class="form-control" placeholder="Enter product Name">
	              	</div>
	              	<div class="form-group">
	              		<label for="product_code">Product Code</label>
	              		<input type="text" @if(!empty($productData['product_code'])) value="{{$productData['product_code']}}" @else value="{{old('product_code')}}" @endif name="product_code" id="product_code" class="form-control" placeholder="Enter product Code">
	              	</div>	
	              	
	              </div>
	              <div class="col-md-6">
	              	<div class="form-group">
	              		<label for="product_color">Product Color</label>
	              		<input type="text" @if(!empty($productData['product_color'])) value="{{$productData['product_color']}}" @else value="{{old('product_color')}}" @endif name="product_color" id="product_color" class="form-control" placeholder="Enter Product Color">
	              	</div>	

	              	<div class="form-group">
	              		<label for="product_price">Product Price</label>
	              		<input type="text" @if(!empty($productData['product_price'])) value="{{$productData['product_price']}}" @else value="{{old('product_price')}}" @endif name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price">
	              	</div>	
	              		
	              </div>
	              <div class="col-md-6">
	              	<div class="form-group">
	              		<label for="product_discount">Product Discount(%)</label>
	              		<input type="text" @if(!empty($productData['product_discount'])) value="{{$productData['product_discount']}}" @else value="{{old('product_discount')}}" @endif name="product_discount" id="product_discount" class="form-control" placeholder="Enter Product Discount">
	              	</div>
	              	<div class="form-group">
	              		<label for="product_weight">Product Weight</label>
	              		<input type="text" @if(!empty($productData['product_weight'])) value="{{$productData['product_weight']}}" @else value="{{old('product_weight')}}" @endif name="product_weight" id="product_weight" class="form-control" placeholder="Enter Product Weight">
	              	</div>

	                
	              </div>
	              <!-- /.col -->
	            </div>

	            <div class="row">
	              <div class="col-12 col-sm-6">
	              	<div class="form-group">
	                    <label for="main_image">Product Main Image</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" class="custom-file-input" id="main_image" name="main_image">
	                        <label class="custom-file-label" for="main_image">Choose file</label>
	                      </div>
	                      <div class="input-group-append">
	                        <span class="input-group-text" id="">Upload</span>
	                      </div>
	                     
	                    </div>
	                    @if(!empty($productData['main_image']))
                             <div style="height: 100px;">
                             	<img style="width: 50px;margin-top: 5px;" src="{{ asset('images/product_images/small/'.$productData['main_image']) }}" alt="">
                             	&nbsp;
                             	 <a class="confirmDelete" record="product-image" recordid="{{ $productData['id'] }}" href="javascript:void(0)" title="">Delete Image</a> 
                             	
                             </div>
	                      @endif
	                  </div>
		              <div class="form-group">
	                    <label for="product_video">Product Video</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" class="custom-file-input" id="product_video" name="product_video">
	                        <label class="custom-file-label" for="product_video">Choose file</label>
	                      </div>
	                      <div class="input-group-append">
	                        <span class="input-group-text" id="">Upload</span>
	                      </div>
	                     </div>
	                     @if(!empty($productData['product_video']))
                          <div>
                          	<a href="{{ url('videos/product_videos/'.$productData['product_video']) }}" title="" download="">Download</a>
                          	&nbsp;|&nbsp;
                             	 <a class="confirmDelete" record="product-video" recordid="{{ $productData['id'] }}" href="javascript:void(0)" title="">Delete Video</a> 
                          </div>
	                     @endif
	                    
	                  </div>
	              </div>
	              <div class="col-12 col-sm-6">

	              	<div class="form-group">
	              		<label for="description">Product Description</label>
	              		<textarea  name="description" id="description" rows="3" class="form-control" placeholder="Enter...">@if(!empty($productData['description'])) {{$productData['description']}} @else {{old('description')}} @endif</textarea>
	              	</div>
       
	              </div>

                  <div class="col-12 col-sm-6">
	              <div class="form-group">
	              		<label for="wash_care">Wash Care</label>
	              		<textarea  name="wash_care" id="wash_care" rows="3" class="form-control" placeholder="Enter...">@if(!empty($productData['wash_care'])) {{$productData['wash_care']}} @else {{old('wash_care')}} @endif</textarea>
	              	</div>
                  </div>
                  
	              <div class="col-12 col-sm-6">
	              	<div class="form-group">
	                  <label for="fabric">Select Fabric</label>
	                  <select name="fabric" id="fabric" class="form-control select2" style="width: 100%;">
	                    <option value="">Select</option>
	                    @foreach($fabricArray as $fabric)
	                     <option value="{{ $fabric }}" @if(!empty($productData['fabric']) && $productData['fabric']==$fabric) selected="" @endif>{{ $fabric }}</option>
	                     @endforeach
	                  </select>
	                </div>
                      <div class="form-group">
	                  <label for="sleeve">Select Sleeve</label>
	                  <select name="sleeve" id="sleeve" class="form-control select2" style="width: 100%;">
	                    <option value="">Select</option>
	                    @foreach($sleeveArray as $sleeve)
	                     <option value="{{ $sleeve }}" @if(!empty($productData['sleeve']) && $productData['sleeve']==$sleeve) selected="" @endif>{{ $sleeve }}</option>
	                     @endforeach
	                  </select>
	                </div>
	                
	              </div>
	              <div class="col-12 col-sm-6">
	              	<div class="form-group">
	                  <label for="pattern">Select Pattern</label>
	                  <select name="pattern" id="pattern" class="form-control select2" style="width: 100%;">
	                    <option value="">Select</option>
	                    @foreach($patternArray as $pattern)
	                     <option value="{{ $pattern }}" @if(!empty($productData['pattern']) && $productData['pattern']==$pattern) selected="" @endif>{{ $pattern }}</option>
	                     @endforeach
	                  </select>
	                </div>
                       <div class="form-group">
	                  <label for="fit">Select Fit</label>
	                  <select name="fit" id="fit" class="form-control select2" style="width: 100%;">
	                    <option value="">Select</option>
	                    @foreach($fitArray as $fit)
	                     <option value="{{ $fit }}" @if(!empty($productData['fit']) && $productData['fit']==$fit) selected="" @endif>{{ $fit }}</option>
	                     @endforeach
	                  </select>
	                </div>
	                
	              </div>
	              <div class="col-12 col-sm-6">
	              <div class="form-group">
	                  <label for="occassion">Select Occasion</label>
	                  <select name="occassion" id="occassion" class="form-control select2" style="width: 100%;">
	                    <option value="">Select</option>
	                    @foreach($occassionArray as $occassion)
	                     <option value="{{ $occassion }}" @if(!empty($productData['occassion']) && $productData['occassion']==$occassion) selected="" @endif>{{ $occassion }}</option>
	                     @endforeach
	                  </select>
	                </div>
                  </div>
                  <div class="col-12 col-sm-6">

	              	<div class="form-group">
	              		<label for="meta_title">Meta Title</label>
	              		<textarea name="meta_title" id="meta_title" rows="3" class="form-control" placeholder="Enter...">@if(!empty($productData['meta_title'])) {{$productData['meta_title']}} @else {{old('meta_title')}} @endif</textarea>
	              	</div>

	              </div>
	               <div class="col-12 col-sm-6">
	              	<div class="form-group">
	              		<label for="meta_description">Meta Description</label>
	              		<textarea name="meta_description" id="meta_description" rows="3" class="form-control" placeholder="Enter...">@if(!empty($productData['meta_description'])) {{$productData['meta_description']}} @else {{old('meta_description')}} @endif</textarea>
	              	</div>	
	              </div>
	              <div class="col-12 col-sm-6">
	              	<div class="form-group">
	              		<label for="meta_keywords">Meta Keyword</label>
	              		<textarea name="meta_keywords" id="meta_keywords" rows="3" class="form-control" placeholder="Enter...">@if(!empty($productData['meta_keywords'])) {{$productData['meta_keywords']}} @else {{old('meta_keywords')}} @endif</textarea>
	              	</div>	
	              	<div class="form-group">
	              		<label for="is_featured">Featured Item</label>
	              		<input type="checkbox" name="is_featured" id="is_featured" value="Yes" @if(!empty($productData['is_featured']) && $productData['is_featured']=="Yes") checked="" @endif>
	              	</div>
	              </div>
	              <!-- /.col -->
	            </div>
	            <!-- /.row -->
	          </div>
	          <!-- /.card-body -->
	          <div class="card-footer">
	            <button type="submit" class="btn btn-primary">Submit</button>
	          </div>
	        </div>
        </form>

      </div><!-- /.container-fluid -->
    </section>

  </div>


@endsection