@php
$adminInfo=Auth::user();
$default_logo=App\Models\BannerImage::find(2);
$default_profile=App\Models\BannerImage::find(3);
@endphp

<!-- Top Navbar -->
<nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
  <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
  <a class="navbar-brand" href="dashboard1.html">
    <img class="brand-img d-inline-block" src="{{asset($default_logo->image) }}" alt="brand" />
  </a>
  <ul class="navbar-nav hk-navbar-content">
    <li class="nav-item dropdown dropdown-authentication">
      <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="media">
          <div class="media-img-wrap">
            <div class="avatar">
              <img src="{{ $adminInfo->image ? asset($adminInfo->image) : asset($default_profile->image) }}" alt="{{ $adminInfo->firstname }} {{ ($adminInfo->lastname) }}" class="avatar-img rounded-circle">
            </div>
            <span class="badge badge-success badge-indicator"></span>
          </div>
          <div class="media-body">
            <span>{{ $adminInfo->firstname }} {{ $adminInfo->lastname }}<i class="zmdi zmdi-chevron-down"></i></span>
          </div>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
        <a class="dropdown-item" href="{{ route('admin.my-profile') }}"><i class="dropdown-icon zmdi zmdi-account"></i><span>{{ __('My Profile') }}</span></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="dropdown-icon zmdi zmdi-power"></i><span>{{ ('Sign Out') }}</span></a>
      </div>
    </li>
  </ul>
</nav>
<!-- /Top Navbar -->