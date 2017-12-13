<div class="card card-block">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.shipping_address') }}</h3>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_firstname') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.firstname') }} <span class="required">*</span>
            </label>
            <input type="text"
                name="shipping_firstname" 
                class="form-control"
                value="{{ 
                    old('shipping_firstname') ?:
                    $vt->shipping_firstname
                }}"
                required
            >
            @if ($errors->has('shipping_firstname'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_firstname') }}
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_lastname') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.lastname') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="shipping_lastname" 
                class="form-control"
                value="{{ 
                    old('shipping_lastname') ?:
                    $vt->shipping_lastname
                }}"

                required
            >
            @if ($errors->has('shipping_lastname'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_lastname') }}
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_email') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.email') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="shipping_email" 
                class="form-control"
                value="{{ 
                    old('shipping_email') ?:
                    $vt->shipping_email
                }}"
                required
            >
            @if ($errors->has('shipping_email'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_email') }}
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_mobile') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.mobile') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="shipping_mobile" 
                class="form-control"
                value="{{ 
                    old('shipping_mobile') ?:
                    $vt->shipping_mobile
                }}"
                required
            >
            @if ($errors->has('shipping_mobile'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_mobile') }}
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_address') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.address') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="shipping_address" 
                class="form-control"
                value="{{ 
                    old('shipping_address') ?:
                    $vt->shipping_address
                }}"

                required
            >
            @if ($errors->has('shipping_address'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_address') }}
                </span>
            @endif
        </div>
    </div>
</div>
</div>