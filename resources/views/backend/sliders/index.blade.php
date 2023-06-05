@extends('layouts.backend.layout')

@section('title')
<title> Smart General Company | Homepage Sliders </title>
@endsection

@section('content')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-light bg-transparent">
    <li class="breadcrumb-item"><a href="#">{{ __('Contents') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Homepage Sliders') }}</li>
  </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

  <!-- Title -->
  <div class="hk-pg-header">
    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="image"></i></span></span>{{ __('Homepage Sliders') }}</h4>
  </div>
  <!-- /Title -->

  <!-- Row -->
  <div class="row">
    <div class="col-xl-12">
      <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{ __('List of Sliders') }}</h5>
        <div class="d-flex align-items-center justify-content-between mb-20">
          <h5 class="hk-sec-title"></h5>
          <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addHomePageSlider">{{ __('Add new Homepage Slider') }}</a>
        </div>

        <div class="row">
          <div class="col-sm">
            <div class="table-wrap">
              <div class="">
                <table id="datable_1" class="table table-hover table-bordered table-responsive" width="100%">
                  <thead>
                    <tr>
                      <th width="5%">{{ __('SN') }}</th>
                      <th width="20%">{{ __('Title') }}</th>
                      <th width="20%">{{ __('Rank No.') }}</th>
                      <th width="20%">{{ __('Image') }}</th>
                      <th width="10%">{{ __('Status') }}</th>
                      <th width="10%">{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sliders as $index=> $item)
                    <tr>
                      <td>{{ ++$index }}</td>
                      <td>{{ $item->title }}</td>
                      <td>{{ $item->rank }}</td>
                      <td>
                        <img src="{{ asset($item->image) }}" width="120px" alt="">
                      </td>
                      <td>
                        @if ($item->status==1)
                        <a href="" onclick="homepageslidersstatus({{ $item->id }})"><input type="checkbox" checked data-toggle="toggle" data-on="{{ __('Active') }}" data-off="{{ __('Inactive') }}" data-onstyle="success" data-offstyle="danger"></a>
                        @else
                        <a href="" onclick="homepageslidersstatus({{ $item->id }})"><input type="checkbox" data-toggle="toggle" data-on="{{ __('Active') }}" data-off="{{ __('Inactive') }}" data-onstyle="success" data-offstyle="danger"></a>

                        @endif
                      </td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#updateHomepageSliders-{{$item->id}}" class="mr-20" data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal" onclick="deleteData({{ $item->id }})" data-original-title="Delete"> <i class="icon-trash txt-danger"></i> </a>
                      </td>
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


<!-- Add web status text-->
<div class="modal fade" id="addHomePageSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Create New Homepage Slider') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-md-6 col-xl-12">
                  <div class="mb-3">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">{{ __('Rank') }}</label>
                    <input type="number" class="form-control" id="rank" name="rank">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12">
              <div class="row">
                <div class="col-md-6 col-xl-12">
                  <div class="mb-3">
                    <label class="form-label">{{ __('Image') }} {{ __('Size 1920 X 930') }}</label>
                    <input type="file" class="form-control" id="image" name="image">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">{{ __('Status') }}</label>
                    <select name="status" class="form-control">
                      <option value="">Select</option>
                      <option value="1">{{ __('Active') }}</option>
                      <option value="0">{{ __('Inactive') }}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer text-end">
          <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach($sliders as $item)
<!-- Update validation text-->
<div class="modal fade" id="updateHomepageSliders-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Update Homepage Slider') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ route('admin.sliders.update',$item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-md-6 col-xl-12">
                  <div class="mb-3">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">{{ __('Rank No.') }}</label>
                    <input type="number" class="form-control" name="rank" id="rank" value="{{ $item->rank }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12">
              <div class="row">
                <div class="col-md-6 col-xl-12">
                  <div class="mb-3">
                    <label class="form-label">{{ __('Existing Image') }}</label>
                    <img src="{{ asset($item->image) }}" width="120px" alt="">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">{{ __('New Homepage Image') }} {{__('Size 1920 X 930') }}</label>
                    <input type="file" class="form-control" id="image" name="image">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">{{ __('Status') }}</label>
                    <select name="status" id="status" class="form-control">
                      <option value="1">{{ __('Active') }}</option>
                      <option value="0">{{ __('Inactive') }}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer text-end">
          <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<script>
  function deleteData(id) {
    $("#deleteForm").attr("action", '{{ url("/admin/sliders/") }}' + "/" + id)
  }

  function homepageslidersstatus(id) {
    $.ajax({
      type: "get",
      url: "{{url('/admin/sliders-status/')}}" + "/" + id,
      success: function(response) {
        toastr.success(response)
      },
      error: function(err) {
        console.log(err);

      }
    })
  }
</script>

@endsection