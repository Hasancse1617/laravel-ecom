
@extends('layouts.front_layout.front_layout')
@section('content')
<div class="page-content">
  <!--login start-->
  <section class="bg-light register">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-10 col-lg-7 col-md-9 shadow p-6 bg-white">
          <div class="col-lg-12 col-md-12 p-0">
            <div class="mb-6">
              <h2 class="font-w-6">Create New Customer Account</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. </p>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 ml-auto mr-auto p-0">
            
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

            <div class="register-form text-center">
              <form method="post" action="{{ url('/reset-password') }}" id="ResetForm">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input id="form_password1" type="password" name="password_confirmation" class="form-control" placeholder="Conform Password">
                    </div>
                  </div>
                </div>
 
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-danger">Reset Password</button>
                  </div>
                </div>
              </form>
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
    
    $('#ResetForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 6
        },
        confirm_password: {
          required: true,
          equalTo: '#password',
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

