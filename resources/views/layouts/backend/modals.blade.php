<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Are you sure you want to delete?') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>{{ __('There is no undo') }}</h6>
      </div>
      <div class="modal-footer">
        <form id="deleteForm" action="" method="POST">
          @csrf
          @method("DELETE")
          <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('No') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('Yes') }}</button>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- sign out  -->
<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Sign Out Confirmation') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{ __('Are you sure you want to sign out?') }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('No, Cancel') }}</button>
        <a href="{{route('admin.logout')}}" class="btn btn-danger">{{ __('Yes, Sign Out') }}</a>
      </div>
    </div>
  </div>
</div>