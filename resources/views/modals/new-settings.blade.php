<div id="newSettings" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <form role="form" method="POST" action="/settings">
    {{ csrf_field() }}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('app.add_new') }}</h4>
      </div>
      <div class="modal-body">
          <div class="form-group {{$errors->has('meta_key') ? 'has-error' : ''}}">
              <label class="control-label">
                  Meta Key <span class="required">*</span>
              </label>
              <input type="text" 
                  name="meta_key" 
                  class="form-control underlined"
                  @if (old('firstname'))
                      value="{{ old('meta_key') }}"
                  @endif
                  required
              >
              @if ($errors->has('meta_key'))                                    
                  <span class="has-error">
                      {{ $errors->first('meta_key') }}
                  </span>
              @endif
          </div> 
          <div class="form-group {{$errors->has('meta_value') ? 'has-error' : ''}}">
              <label class="control-label">
                  Meta Value <span class="required">*</span>
              </label>
              <input type="text" 
                  name="meta_value" 
                  class="form-control underlined"
                  @if (old('meta_value'))
                      value="{{ old('meta_value') }}"
                  @endif
                  required
              > 
              @if ($errors->has('app_title'))                                    
                  <span class="has-error">
                      {{ $errors->first('app_title') }}
                  </span>
              @endif
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-block btn-primary">{{ trans('app.submit') }}</button>
      </div>
    </div>
    </form>

  </div>
</div>