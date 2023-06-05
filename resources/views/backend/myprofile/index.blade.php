@extends('layouts.backend.layout')

@section('title')
<title>{{ __('Smart General Company | Update My Profile')}} </title>
@endsection

@section('content')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-light bg-transparent">
    <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Update My Profile') }}</li>
  </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

  <!-- Title -->
  <div class="hk-pg-header">
    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="users"></i></span></span>{{ __('Update My Profile') }}</h4>
  </div>
  <!-- /Title -->

  <!-- Row -->
  <div class="row">
    <div class="col-xl-12">
      <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{ __('My Profile Information') }}</h5>

        <div class="row mt-4">
          <div class="col-sm">
            <div class="">
              <div class="">
                <form action="{{ route('admin.update.my-profile') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group mb-3 ">
                        <label class="form-label required">{{ __('First name') }}</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{  $admin->firstname }}">
                      </div>
                    </div>
                    <div class="col-md-6  col-lg-3">
                      <div class="form-group mb-3 ">
                        <label class="form-label required">{{ __('Last name') }}</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{  $admin->lastname }}">
                      </div>
                    </div>
                    <div class="col-md-6  col-lg-3">
                      <div class="form-group mb-3 ">
                        <label class="form-label required">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{  $admin->email }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-lg-4">
                      <div class="form-group mb-3 ">
                        <label class="form-label required">{{ __('Phone number') }}</label>
                        <input type="number" class="form-control" id="phonenumber" name="phonenumber" value="{{  $admin->phonenumber }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-lg-4">
                      <div class="form-group mb-3 ">
                        <label class="form-label">{{ __('Existing profile picture') }}</label>
                        @if ($admin->image)
                        <div class="avatar">
                          <img src="{{ url($admin->image) }}" alt="default user image" width="100px" class="avatar-img">
                        </div>

                        @else
                        <div class="avatar">
                          <img src="{{ url($default_profile->image) }}" alt="default user image" width="100px" class="avatar-img">
                        </div>

                        @endif
                      </div>
                    </div>
                    <div class="col-md-6  col-lg-4">
                      <div class="form-group mb-3 ">
                        <label class="form-label required">{{ __('Profile picture') }}</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".png, .jpg">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-lg-6">
                      <div class="form-group mb-3 ">
                        <label class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>
                    </div>
                    <div class="col-md-6  col-lg-6">
                      <div class="form-group mb-3 ">
                        <label class="form-label">{{ __('Confirm Password') }}</label>
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                      </div>
                    </div>
                  </div>
                  <div class="form-footer text-end">
                    <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- /Row -->

</div>
<!-- /Container -->



@endsection