 @extends('layouts.admin_layout.admin_layout')
 @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>
                  Add User
                  <a href="{{ url('admin/users') }}" class="btn btn-success float-right"><i class="fas fa-list"></i>&nbsp;User List</a>
                </h3>
              </div>
              <div class="card-body">
                 <form  method="post" action="{{ url('admin/add-user') }}" id="addUser">
                 	@csrf
	                <div class="form-row">
	                  <div class="form-group col-md-6">
	                    <label for="name">Name</label>
	                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
	                    <font style="color: red">
	                    	{{ ($errors->has('name'))?($errors->first('name')):'' }}
	                    </font>
	                  </div>
	                  <div class="form-group col-md-6">
	                    <label for="email">Email</label>
	                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
	                    <font style="color: red">
	                    	{{ ($errors->has('email'))?($errors->first('email')):'' }}
	                    </font>
	                  </div>
	                  <div class="form-group col-md-6">
	                    <label for="mobile">Email</label>
	                    <input type="mobile" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile">
	                    <font style="color: red">
	                    	{{ ($errors->has('mobile'))?($errors->first('mobile')):'' }}
	                    </font>
	                  </div>
	                  <div class="form-group col-md-6">
	                  	<label for="usertype">User Role</label>
	                  	<select name="type" id="type" class="form-control">
	                  		<option value="">Select Role</option>
	                  		<option value="Admin">Admin</option>
	                  		<option value="User">User</option>
	                  	</select>
	                  </div>
	                </div>
	                 <input type="submit" class="btn btn-primary" value="Submit">
	              </form>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
	<script type="text/javascript">
	
	$(document).ready(function () {
	  
	  $('#addUser').validate({
	    rules: {
	      name: {
	        required: true,
	      },
	      email: {
	        required: true,
	        email: true,
	      },
	      mobile: {
	        required: true,
	      },
	      type: {
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