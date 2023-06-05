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
                <table id="tblData" class="table table-wrap table-bordered table-responsive">
                  @foreach($images as $image)
                  <tr>
                    <form action="{{ route('admin.update-profile-image',$image->id) }}" enctype="multipart/form-data" method="POST">
                      @csrf
                      <td>{{ $image->location }}</td>
                      <td><img src="{{ asset($image->image) }}" width="120px" alt=""></td>
                      <td><input type="file" class="form-control" name="image" value=""></td>
                      <td><button type="submit" class="btn btn-success">{{__('Update') }}</button></td>
                    </form>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
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