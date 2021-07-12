
@extends('layouts.front_layout.front_layout')
@section('content')
<div class="page-content">
  <section class="bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-6 col-md-8 col-sm-11">
          
          <div class="shadow p-6 login bg-white">
            <div class="store-name">flipmarto</div>
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
            <h4 class="text-left mb-3 font-w-5">Reset Password</h4>
            <form id="ForgotForm" method="post" action="{{ url('/forgot-password') }}">
              @csrf
              <div class="form-group">
                <input  type="text" name="email" class="form-control" placeholder="Enter Email">
              </div>
              <button class="btn btn-primary btn-block">Reset Password Link</button>
            </form>
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
    
    $('#ForgotForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
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

