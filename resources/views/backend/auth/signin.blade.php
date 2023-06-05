<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>{{ __('Smart General Company | Sign In') }}</title>
  <meta name="description" content="Tanzania Telecommunications Corporation" />

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('backend/dist/img/favicon.png') }}" type="image/x-icon">

  <!-- Toggles CSS -->
  <link href="{{ asset('backend/vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('backend/vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom CSS -->
  <link href="{{ asset('backend/dist/css/style.css') }}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
</head>

<body>
  <!-- Preloader -->
  <div class="preloader-it">
    <div class="loader-pendulums"></div>
  </div>
  <!-- /Preloader -->
  @php
  $default_logo=App\Models\BannerImage::find(2);
  @endphp

  <!-- HK Wrapper -->
  <div class="hk-wrapper">

    <!-- Main Content -->
    <div class="hk-pg-wrapper hk-auth-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12 pa-0">
            <div class="auth-form-wrap pt-xl-0 pt-70">
              <div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
                <div class="card">
                  <div class="card-body">
                    <a class="auth-brand text-center d-block mb-20" href="/">
                      <img class="brand-img" src="{{asset($default_logo->image) }}" alt="brand" />
                    </a>
                    <form id="adminLoginForm">
                      @csrf
                      <h5 class="text-center mb-10"><strong>{{ __('SMART GENERAL COMPANY') }}</strong></h5>
                      <p class="text-left mb-10">{{ __('Sign In') }}</p>
                      <div class="form-group">
                        <input class="form-control" placeholder="Email" type="email" name="email" id="exampleInputEmail">
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <input class="form-control" placeholder="Password" type="password" id="exampleInputPassword" name="password" autocomplete="off">
                        </div>
                      </div>
                      <button class="btn btn-dark btn-block" type="button" id="adminLoginBtn">{{ __('Sign In') }}</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Main Content -->

  </div>
  <!-- /HK Wrapper -->

  <!-- JavaScript -->

  <!-- jQuery -->
  <script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('backend/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

  <!-- Slimscroll JavaScript -->
  <script src="{{ asset('backend/dist/js/jquery.slimscroll.js') }}"></script>

  <!-- Fancy Dropdown JS -->
  <script src="{{ asset('backend/dist/js/dropdown-bootstrap-extended.js') }}"></script>

  <!-- FeatherIcons JavaScript -->
  <script src="{{ asset('backend/dist/js/feather.min.js') }}"></script>

  <!-- Init JavaScript -->
  <script src="{{ asset('backend/dist/js/init.js') }}"></script>
  <script src="{{ asset('toastr/toastr.min.js') }}"></script>

  <script>
    (function($) {
      "use strict";
      $(document).ready(function() {
        $("#adminLoginBtn").on('click', function(e) {
          e.preventDefault();

          $.ajax({
            url: "{{ route('admin.login') }}",
            type: "post",
            data: $('#adminLoginForm').serialize(),
            success: function(response) {
              if (response.success) {
                window.location.href = "{{ route('admin.dashboard')}}";
                toastr.success(response.success)
              }
              if (response.error) {
                toastr.error(response.error)

              }
            },
            error: function(response) {
              if (response.responseJSON.errors.email) toastr.error(response.responseJSON.errors.email[0])
              if (response.responseJSON.errors.password) toastr.error(response.responseJSON.errors.password[0])

            }

          });


        })

        $(document).on('keyup', '#exampleInputEmail, #exampleInputPassword', function(e) {
          if (e.keyCode == 13) {
            e.preventDefault();

            $.ajax({
              url: "{{ route('admin.login') }}",
              type: "post",
              data: $('#adminLoginForm').serialize(),
              success: function(response) {
                if (response.success) {
                  window.location.href = "{{ route('admin.dashboard')}}";
                  toastr.success(response.success)
                }
                if (response.error) {
                  toastr.error(response.error)

                }
              },
              error: function(response) {
                if (response.responseJSON.errors.email) toastr.error(response.responseJSON.errors.email[0])
                if (response.responseJSON.errors.password) toastr.error(response.responseJSON.errors.password[0])

              }

            });

          }

        })
      });

    })(jQuery);
  </script>
  <script>
    @if(Session::has('messege'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
      case 'info':
        toastr.info("{{ Session::get('messege') }}");
        break;
      case 'success':
        toastr.success("{{ Session::get('messege') }}");
        break;
      case 'warning':
        toastr.warning("{{ Session::get('messege') }}");
        break;
      case 'error':
        toastr.error("{{ Session::get('messege') }}");
        break;
    }
    @endif
  </script>

</body>

</html>