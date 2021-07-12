  @extends('layouts.admin_layout.admin_layout')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
      <div class="row mb-2">
    <!-- general form elements -->
        <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Details</h3>
              </div>
              </div>
              <!-- form start -->
              <form role="form" method="post" action="{{ url('/admin/update-admin-details') }}" name="update_admin_details" id="update_admin_details" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                    <input class="form-control" id="exampleInputEmail1" value="{{Auth::guard('admin')->user()->email }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Type</label>
                    <input  class="form-control" id="exampleInputEmail1" value="{{Auth::guard('admin')->user()->type }}" readonly>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" id="admin_name" name="admin_name" value="{{Auth::guard('admin')->user()->name }}" placeholder="Admin name">
                    <span id="check_p"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile</label>
                    <input type="text" class="form-control" id="admin_mobile" name="admin_mobile" value="{{Auth::guard('admin')->user()->mobile }}" placeholder="Enter Mobile number">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" id="image" name="admin_image" >
                    
                     
                    <img id="showImage" class="mt-2"
                       src="{{(!empty(Auth::guard('admin')->user()->image))?url('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image):url('images/admin_images/admin_photos/avatar.png')}}"
                       alt="User profile picture" width="100px" height="100px">

                  </div>
                  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

        </div>
       </div>
      </div>     <!-- /.card -->
    <!-- /.content -->
  </div>

  @endsection