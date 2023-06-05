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
                <form action="{{ route('admin.update.cookie.consent.setting') }}" method="POST">
                  @csrf

                  <div class="row mb-2">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">{{ __('Allow Cookie Consent') }}</label>
                        <select name="allow" id="" class="form-control">
                          <option {{ $setting->status==1 ? 'selected':'' }} value="1">{{ __('Yes') }}</option>
                          <option {{ $setting->status==0 ? 'selected':'' }} value="0">{{ __('No') }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">{{ __('Border') }}</label>
                        <select name="border" id="" class="form-control">
                          <option {{ $setting->border=='none' ? 'selected':'' }} value="none">{{ __('None') }}</option>
                          <option {{ $setting->border=='thin' ? 'selected':'' }} value="thin">{{ __('Thin') }}</option>
                          <option {{ $setting->border=='normal' ? 'selected':'' }} value="normal">{{ __('Normal') }}</option>
                          <option {{ $setting->border=='thick' ? 'selected':'' }} value="thick">{{ __('Thick') }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">{{ __('Corner') }}</label>
                        <select name="corners" id="" class="form-control">
                          <option {{ $setting->corners=='none' ? 'selected':'' }} value="none">{{ __('None') }}</option>
                          <option {{ $setting->corners=='small' ? 'selected':'' }} value="small">{{ __('Small') }}</option>
                          <option {{ $setting->corners=='normal' ? 'selected':'' }} value="normal">{{ __('Normal') }}</option>
                          <option {{ $setting->corners=='large' ? 'selected':'' }} value="large">{{ __('Large') }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group mt-3">
                        <label for="bg_color">{{ __('Background Color') }}</label>
                        <input type="color" name="background_color" id="bg_color" value="{{ $setting->background_color }}">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group mt-3">
                        <label for="text_color">{{ __('Text Color') }}</label>
                        <input type="color" name="text_color" id="text_color" value="{{ $setting->text_color }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group mt-3">
                        <label for="border_color">{{ __('Border color') }}</label>
                        <input type="color" name="border_color" id="border_color" value="{{ $setting->border_color }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group mt-3">
                        <label for="btn_bg_color">{{ __('Button Color') }}</label>
                        <input type="color" name="button_color" id="btn_bg_color" value="{{ $setting->btn_bg_color }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group mt-3">
                        <label for="btn_text_color">{{ __('Button text color') }}</label>
                        <input type="color" name="btn_text_color" id="btn_text_color" value="{{ $setting->btn_text_color }}">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">{{ __('Link Text') }}</label>
                        <input type="text" name="link_text" value="{{ $setting->link_text }}" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">{{ __('Button text') }}</label>
                        <input type="text" name="btn_text" value="{{ $setting->btn_text }}" class="form-control">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <label for="cookie_text">{{ __('Message') }}</label>
                    <textarea class="form-control" name="message" id="cookie_text" cols="30" rows="5">{{ $setting->message }}</textarea>
                  </div>
                  <div class="mt-2 text-right">
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