<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('title')
  <meta name="description" content="Smart General Company Limited" />

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('backend/dist/img/favicon.png') }}" type="image/x-icon">

  <!-- Data Table CSS -->
  <link href="{{ asset('backend/vendors/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

  <!-- Toggles CSS -->
  <link href="{{ asset('backend/vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('backend/vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom CSS -->
  <link href="{{ asset('backend/dist/css/style.css') }}" rel="stylesheet" type="text/css">

  <!-- Toastr CSS -->
  <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

  <link href="{{ asset('toggle/bootstrap-toggle.min.css') }}" rel="stylesheet">

</head>