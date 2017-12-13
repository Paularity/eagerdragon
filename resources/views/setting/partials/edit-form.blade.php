<div class="card card-block sameheight-item">                             
    @if(session()->has('success'))
        <div class="alert alert-success fade in alert-dismissable">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card-title-block">
        <a href="{{ url('settings') }}"
            class="btn btn-primary" 
        >
            {{ trans('app.settings_list') }}
        </a>
    </div> 
<div class="row">
    <div class="col-md-6">
      <div class="form-group {{$errors->has('meta_key') ? 'has-error' : ''}}">
          <label class="control-label">
              Meta Key <span class="required">*</span>
          </label>
          <input type="text" 
              name="meta_key" 
              class="form-control underlined"
              @if (old('firstname'))
                  value="{{ old('meta_key') }}"
              @elseif (isset($setting))
                  value="{{ $setting->meta_key }}"
              @endif
              required
          >
          @if ($errors->has('meta_key'))                                    
              <span class="has-error">
                  {{ $errors->first('meta_key') }}
              </span>
          @endif
      </div> 
    </div>
    <div class="col-md-6">
      <div class="form-group {{$errors->has('meta_value') ? 'has-error' : ''}}">
          <label class="control-label">
              Meta Value <span class="required">*</span>
          </label>
          <input type="text" 
              name="meta_value" 
              class="form-control underlined"
              @if (old('firstname'))
                  value="{{ old('meta_value') }}"
              @elseif (isset($setting))
                  value="{{ $setting->meta_value }}"
              @endif

              required
          > 
          @if ($errors->has('meta_value'))                                    
              <span class="has-error">
                  {{ $errors->first('meta_value') }}
              </span>
          @endif
      </div>
    </div>
</div>