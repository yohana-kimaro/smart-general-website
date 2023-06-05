@extends('layouts.backend.layout')

@section('title')
<title> Smart General Company | General Settings </title>
@endsection

@section('content')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-light bg-transparent">
    <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('General Settings') }}</li>
  </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

  <!-- Title -->
  <div class="hk-pg-header">
    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="settings"></i></span></span>{{ __('General Settings') }}</h4>
  </div>
  <!-- /Title -->

  <!-- Row -->
  <div class="row">
    <div class="col-xl-12">
      <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{ __('General Settings') }}</h5>

        <div class="row mt-4">
          <div class="col-sm">
            <div class="">
              <div class="">
                <form action="{{ route('admin.settings.update',$setting->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <div class="form-group mb-3 ">
                    <label class="form-label">{{ __('Current Header Logo') }}</label>
                    @if ($setting->logo)
                    <div>
                      <img src="{{ url($setting->logo) }}" alt="logo" class="w_200">
                    </div>
                    @endif
                  </div>
                  <div class="form-group mb-3 ">
                    <label class="form-label">{{ __('New Header Logo') }}</label>
                    <div>
                      <input type="file" class="form-control" name="logo">
                    </div>
                  </div>
                  <div class="form-group mb-3 ">
                    <label class="form-label">{{ __('Existing Favicon') }}</label>
                    @if ($setting->favicon)
                    <div>
                      <img src="{{ url($setting->favicon) }}" alt="favicon" class="avatar" class="w_50">
                    </div>
                    @endif
                  </div>
                  <div class="form-group mb-3 ">
                    <label class="form-label">{{ __('New Favicon') }}</label>
                    <div>
                      <input type="file" class="form-control" name="favicon">
                    </div>
                  </div>
                  <div class="form-footer text-right">
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