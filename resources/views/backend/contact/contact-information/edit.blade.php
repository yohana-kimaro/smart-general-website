@extends('layouts.backend.layout')

@section('title')
<title> Smart General Company | General Settings </title>
@endsection

@section('content')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-light bg-transparent">
    <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Login Settings') }}</li>
  </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

  <!-- Title -->
  <div class="hk-pg-header">
    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="settings"></i></span></span>{{ __('Login Settings') }}</h4>
  </div>
  <!-- /Title -->

  <!-- Row -->
  <div class="row">
    <div class="col-xl-12">
      <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{ __('Login Settings') }}</h5>

        <div class="row mt-4">
          <div class="col-sm">
            <div class="">
              <div class="">
                <form action="{{ route('admin.contact-information.update',$contact->id) }}" method="POST" class="row g-3">
                  @csrf
                  @method('patch')
                  <div class="row">
                    <div class="col-12 mb-2">
                      <div class="col-lg-12 col-md-6">
                        <label for="address">{{ __('Address') }}</label>
                        <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $contact->address }}</textarea>
                      </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                      <div class="col-lg-12 col-md-6">
                        <label for="phone">{{ __('Phone number') }}</label>
                        <textarea name="phone" id="phone" cols="30" rows="2" class="form-control">{{ $contact->phones }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-12 mb-2">
                      <div class="col-lg-12 col-md-6">
                        <label for="email">{{ __('Email') }}</label>
                        <textarea name="email" id="email" cols="30" rows="2" class="form-control">{{ $contact->emails }}</textarea>
                      </div>
                    </div>


                    <div class="col-md-12 mb-2">
                      <div class="col-lg-12 col-md-6">
                        <label for="map_embed_code">{{ __('Google Map Code') }}</label>
                        <textarea name="map_embed_code" id="map_embed_code" class="form-control" cols="30" rows="5">{{ $contact->map_embed_code }}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-2 text-right form-group">
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