@php
$default_logo2=App\Models\BannerImage::find(2);
@endphp

<!-- Vertical Nav -->
<nav class="hk-nav hk-nav-dark">
  <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
  <div class="nicescroll-bar">
    <div class="navbar-nav-wrap">
      <ul class="navbar-nav flex-column">
        <li class="nav-item {{ Route::is('admin.dashboard')?'active':'' }}">
          <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <span class="feather-icon"><i data-feather="aperture"></i></span>
            <span class="nav-link-text">{{ __('Dashboard') }}</span>
          </a>
        </li>
        <hr class="nav-separator">
        <div class="nav-header">
          <span>{{ __('Contents Interface') }}</span>
          <span>{{ __('CI') }}</span>
        </div>
        <li class="nav-item {{ Route::is('admin.about.index') || Route::is('admin.sliders.index') || Route::is('admin.partner.index') || Route::is('admin.specialize.index') || Route::is('admin.services.index') || Route::is('admin.solutions.index')  || Route::is('admin.projects.index') ? 'active': '' }}">
          <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#app_drp">
            <span class="feather-icon"><i data-feather="image"></i></span>
            <span class="nav-link-text">{{ __('Contents') }}</span>
          </a>
          <ul id="app_drp" class="nav flex-column collapse {{ Route::is('admin.about.index') || Route::is('admin.sliders.index') || Route::is('admin.partner.index') || Route::is('admin.specialize.index') || Route::is('admin.services.index') || Route::is('admin.solutions.index')  || Route::is('admin.projects.index') ? 'show': '' }} collapse-level-1">
            <li class="nav-item">
              <ul class="nav flex-column">
                <li class="nav-item {{ Route::is('admin.sliders.index')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.sliders.index') }}">{{__('Home Sliders')}}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.about.index')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.about.index') }}">{{__('About Us')}}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.specialize.index')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.specialize.index') }}">{{ _('Specialize')}}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.services.index')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.services.index') }}">{{__('Services')}}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.solutions.index')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.solutions.index') }}">{{__('Solution')}}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.projects.index')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.projects.index') }}">{{__('Projects')}}</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <hr class="nav-separator">
      <div class="nav-header">
        <span>{{ __('Settings Interface') }}</span>
        <span>{{__('SI') }}</span>
      </div>
      <ul class="navbar-nav flex-column ">
        <li class="nav-item {{
                Route::is('admin.settings.index') ||
                Route::is('admin.cookie.consent.setting') ||
                Route::is('admin.banner.image') ||
                Route::is('admin.email.template') || Route::is('admin.login.image') || Route::is('admin.profile.image') || Route::is('admin.contact-information.index') || Route::is('admin.administrators') ||  Route::is('admin.bg.image') || Route::is('admin.paginator') ? 'active' :'' }}">
          <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#Components_drp">
            <span class="feather-icon"><i data-feather="settings"></i></span>
            <span class="nav-link-text">{{__('Settings')}}</span>
          </a>
          <ul id="Components_drp" class="nav flex-column collapse {{
                Route::is('admin.settings.index') ||
                Route::is('admin.cookie.consent.setting') ||
                Route::is('admin.banner.image') ||
                Route::is('admin.email.template') || Route::is('admin.login.image') || Route::is('admin.profile.image') || Route::is('admin.bg.image') || Route::is('admin.administrators') || Route::is('admin.contact-information.index')|| Route::is('admin.paginator') ? 'show' :'' }} collapse-level-1">
            <li class="nav-item">
              <ul class="nav flex-column">
                <li class="nav-item {{ Route::is('admin.settings.index')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.settings.index') }}">{{__('General Settings')}}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.cookie.consent.setting')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.cookie.consent.setting') }}">{{__('Cookies Modal')}}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.login.image')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.login.image') }}">{{__('Login Logo')}}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.profile.image')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.profile.image') }}">{{__('Default Profile Image') }}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.contact-information.index')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.contact-information.index') }}">{{ __('Contact Information') }}</a>
                </li>
                <li class="nav-item {{ Route::is('admin.administrators')?'active':'' }}">
                  <a class="nav-link" href="{{ route('admin.administrators') }}">{{__('Administrators')}}</a>
                </li>                
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <hr class="nav-separator">
    </div>
  </div>
</nav>
<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
<!-- /Vertical Nav -->