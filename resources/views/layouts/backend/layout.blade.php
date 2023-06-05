<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.backend.header')

<body>
  <!-- Preloader -->
  <div class="preloader-it">
    <div class="loader-pendulums"></div>
  </div>
  <!-- /Preloader -->

  <!-- HK Wrapper -->
  <div class="hk-wrapper hk-vertical-nav">
    @include('layouts.backend.topnav')
    @include('layouts.backend.sidebar')

    <!-- Main Content -->
    <div class="hk-pg-wrapper">

    @yield('content')

      @include('layouts.backend.copyright')
    </div>
    <!-- /Main Content -->

  </div>
  <!-- /HK Wrapper -->
  @include('layouts.backend.scripts')
  @include('layouts.backend.modals')

</body>

</html>