@extends('layouts.backend.layout')

@section('title')
<title> Smart General Company | Background Image </title>
@endsection

@section('content')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-light bg-transparent">
    <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Background Image') }}</li>
  </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

  <!-- Title -->
  <div class="hk-pg-header">
    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="image"></i></span></span>{{ __('Background Images') }}</h4>
  </div>
  <!-- /Title -->

  <!-- Row -->
  <div class="row">
    <div class="col-xl-12">
      <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{ __('List of Background Images') }}</h5>
        <div class="d-flex align-items-center justify-content-between mb-20">
          <h5 class="hk-sec-title"></h5>
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
                      <th width="20%">{{ __('Description') }}</th>
                      <th width="20%">{{ __('Image') }}</th>
                      <th width="10%">{{ __('Status') }}</th>
                      <th width="10%">{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($projects as $index=> $item)
                    <tr>
                      <td>{{ ++$index }}</td>
                      <td>{{ $item->header }}</td>
                      <td>{{ $item->description }}</td>
                      <td>
                        <img src="{{ asset($item->image) }}" width="120px" alt="">
                      </td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#updateProjectContent-{{$item->id}}" class="mr-20" data-original-title="Edit"> <i class="icon-pencil"></i> </a>
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
<div class="modal fade" id="addProjectsPage" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Create New Project Content') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-md-6 col-xl-12">
                  <div class="mb-3">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="header" name="header">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" id="description" name="description" rows="8" placeholder="Content..."></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12">
              <div class="row">
                <div class="col-md-6 col-xl-12">
                  <div class="mb-3">
                    <label class="form-label">{{ __('Image') }} {{ __('Size 900 X 450') }}</label>
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

@foreach($projects as $item)
<!-- Update validation text-->
<div class="modal fade" id="updateProjectContent-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Update Project Content') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ route('admin.projects.update',$item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-md-6 col-xl-12">
                  <div class="mb-3">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="header" name="header" value="{{ $item->header }}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" id="description" rows="8">{{ $item->description }}</textarea>
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
                    <label class="form-label">{{ __('New Image') }} {{__('Size 900 X 450') }}</label>
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
    $("#deleteForm").attr("action", '{{ url("/admin/projects/") }}' + "/" + id)
  }

  function projectscontentsstatus(id) {
    $.ajax({
      type: "get",
      url: "{{url('/admin/projects-status/')}}" + "/" + id,
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