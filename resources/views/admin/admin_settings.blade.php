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
              <li class="breadcrumb-item active">Settings v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- general form elements -->
        <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update password</h3>
              </div>
              </div>
              <!-- /.card-header -->
               @if(Session::has('error_message'))
      		      <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
              <!-- form start -->
              <form role="form" method="post" action="{{ url('/admin/update-current-pwd') }}" name="update_pwd">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $adminDetails->email }}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Type</label>
                    <input  class="form-control" id="exampleInputEmail1" value="{{ $adminDetails->type }}" readonly="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password" class="form-control" id="current_pwd" name="current_pwd" placeholder="Current Password" required>
                    <span id="check_p"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="New Password" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="COnfirm new Password" required>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
            <!-- /.card -->
    <!-- /.content -->
  </div>

  @endsection