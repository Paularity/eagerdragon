<div id="changeLogo" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <form role="form" method="POST"
        action="{{ url('settingsLogo') }}"
        enctype="multipart/form-data"
    >
    {{ csrf_field() }}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('app.change_logo') }}</h4>
      </div>
      <div class="modal-body">
      @if (isset($logo))
        <img src="/resources/assets/logo/{{ $logo->meta_value }}" alt=""
          class="img-circle img-bordered logo-img">
      @endif
        <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
          <label class="btn btn-primary btn-file">
            Browse <input type="file" name="company_logo" hidden>
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-block btn-primary">{{ trans('app.submit') }}</button>
      </div>
    </div>
    </form>

  </div>
</div>
