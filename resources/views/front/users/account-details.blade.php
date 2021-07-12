<div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
<div class="card border-0">
  <h5 class="font-w-6">Account Details</h5>
  <div class="card-body">
    <!-- <p>Already have an account? <a href="#">Login</a></p> -->
    <form method="post" action="{{ url('/update-details') }}" id="accountDetail">
      
      @csrf
      <div class="row">
        <div class="form-group col-md-6">
          <label>First Name <span class="required">*</span></label>
          <input required class="form-control" name="fname" type="text" value="{{ Auth::user()->fname }}">
        </div>
        <div class="form-group col-md-6">
          <label>Last Name <span class="required">*</span></label>
          <input required class="form-control" name="lname" type="text" value="{{ Auth::user()->lname }}">
        </div>
        <div class="form-group col-md-12">
          <label>Display Name <span class="required">*</span></label>
          <input required class="form-control" name="dname" type="text" value="{{ Auth::user()->dname }}">
        </div>
        <div class="form-group col-md-12">
          <label>Email Address <span class="required">*</span></label>
          <input required class="form-control" type="email" value="{{ Auth::user()->email }}" readonly="">
        </div>
        <div class="form-group col-md-12">
          <label>Current Password <span class="required">*</span></label>
          <input required class="form-control" name="password" type="password" id="current_password">
          <span id="check_password_error" class="text-danger"></span>
        </div>
        <div class="form-group col-md-12">
          <label>New Password <span class="required">*</span></label>
          <input required class="form-control" name="new_password" type="password" id="new_password">
        </div>
        <div class="form-group col-md-12">
          <label>Confirm Password <span class="required">*</span></label>
          <input required class="form-control" name="confirm_password" type="password">
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary" >Save</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    
    $('#accountDetail').validate({
      rules: {
        fname: {
          required: true,
        },
        lname: {
          required: true,
        },
        dname: {
          required: true,
        },
        password: {
          required: true,
        },
        new_password: {
          required: true,
          minlength: 6
        },
        confirm_password: {
          required: true,
          equalTo: '#new_password',
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