@extends('layouts.backend.layout')

@section('title')
<title> Smart General Company | Dashboard </title>
@endsection

@section('content')

<!-- Container -->
<div class="container mt-xl-20 mt-sm-30 mt-10">
  <!-- Title -->
  <div class="hk-pg-header align-items-top">
    <div>
      <h4 class="hk-pg-title font-weight-600">Dashboard</h4>
    </div>
  </div>
  <!-- /Title -->

  <!-- Row -->
  <div class="row">
    <div class="col-xl-12">
      <div class="hk-row">
        <div class="col-sm-12">
          <div class="card-group hk-dash-type-2">
            <div class="card card-sm">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-5">
                  <div>
                    <span class="d-block font-15 text-dark font-weight-500">Users</span>
                  </div>
                </div>
                <div>
                  <span class="d-block display-4 text-dark mb-5">{{ $users->count()}}</span>
                </div>
              </div>
            </div>

            <!-- <div class="card card-sm">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-5">
                  <div>
                    <span class="d-block font-15 text-dark font-weight-500">Campaign Leads</span>
                  </div>
                </div>
                <div>
                  <span class="d-block display-4 text-dark mb-5"><span class="counter-anim">168,856</span></span>
                </div>
              </div>
            </div>

            <div class="card card-sm">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-5">
                  <div>
                    <span class="d-block font-15 text-dark font-weight-500">New Contacts</span>
                  </div>
                </div>
                <div>
                  <span class="d-block display-4 text-dark mb-5">73</span>
                </div>
              </div>
            </div>

            <div class="card card-sm">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-5">
                  <div>
                    <span class="d-block font-15 text-dark font-weight-500">Win/Loss Ratio</span>
                  </div>
                </div>
                <div>
                  <span class="d-block display-4 text-dark mb-5">48:65</span>
                </div>
              </div>
            </div> -->

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Row -->
</div>
<!-- /Container -->

@endsection