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
    <div class="container-fluid">
      <div class="row mb-2">
    <!-- general form elements -->
        <div class="col-md-6 offset-md-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Admin Details</h3>
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

              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
             @endif
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ (!Auth::guard('admin')->user()->image)? url('images/admin_images/admin_photos/avatar.png') : url('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image)}}" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{ Auth::guard('admin')->user()->name }}</h3>

                  <h5 class="text-muted text-center"><span class="badge badge-primary">{{ Auth::guard('admin')->user()->type }}</span></h5>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Name:</b> <a class="float-right">{{ Auth::guard('admin')->user()->name }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Role:</b> <a class="float-right">{{ Auth::guard('admin')->user()->type }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email:</b> <a class="float-right">{{ Auth::guard('admin')->user()->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Mobile:</b> <a class="float-right">{{ Auth::guard('admin')->user()->mobile }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Status:</b> <a class="float-right">Active</a>
                    </li>
                  </ul>

                  <a href="{{ url('admin/update-admin-details') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                </div>
              </div>
     
            </div>
        </div>
       </div>
      </div>     <!-- /.card -->
    <!-- /.content -->
  </div>

  @endsection