
@extends('layouts.front_layout.front_layout')
@section('content')
<div class="page-content">
  <section class="bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-6 col-md-8 col-sm-11">
          
          <div class="shadow p-6 login bg-white">
            <div class="store-name">hmarto</div>
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
              </div><br />
              @endif
              
              @if(Session::has('error_message'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 {{ Session::get('error_message') }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               @endif
            <h4 class="text-left mb-3 font-w-5">Customer Login</h4>
            <form id="loginForm" method="post" action="{{ url('/login-user') }}">
              @csrf
              <div class="form-group">
                <input  type="text" name="email" class="form-control" placeholder="User Email">
              </div>
              <div class="form-group">
                <input  type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group mt-4 mb-5">
                <div class="remember-checkbox d-flex align-items-center justify-content-between">
                  <div class="checkbox">
                    <input type="checkbox" id="check2" name="remember_me">
                    <label for="check2">Remember me</label>
                  </div>
                  <a href="{{ url('/forgot-password') }}">Forgot Password?</a>
                </div>
              </div>
              <button class="btn btn-primary btn-block">Login Now</button>
            </form>
            <div class="another_login"><span> or</span></div>
            <ul class="login-btn list_none text-center">
              <li><a href="{{ url('auth/facebook') }}" class="btn facebook-btn"><i class="ion-social-facebook"></i>Facebook</a></li>
              <li><a href="{{ url('auth/google') }}" class="btn google-btn"><i class="ion-social-googleplus"></i>Google</a></li>
            </ul>
            <div class="d-flex align-items-center text-center justify-content-center mt-4">
              <span class="text-muted mr-1">Don't have an account?</span>
              <a href="{{ url('/register') }}">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--login end-->
  @include('layouts.front_layout.subscribe')
</div>
<script type="text/javascript">
  $(document).ready(function () {
    
    $('#loginForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 6
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

