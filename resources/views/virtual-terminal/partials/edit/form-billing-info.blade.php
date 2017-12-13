<div class="card card-block">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.billing_address') }}</h3>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('billing_firstname') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.firstname') }} <span class="required">*</span>
            </label>
            <input type="text"
                name="billing_firstname" 
                class="form-control"
                value="{{ 
                    old('billing_firstname') ?:
                    $vt->billing_firstname
                }}"
                required
            >
            @if ($errors->has('billing_firstname'))                                    
                <span class="has-error">
                    {{ $errors->first('billing_firstname') }}
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('billing_lastname') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.lastname') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="billing_lastname" 
                class="form-control"
                value="{{ 
                    old('billing_lastname') ?:
                    $vt->billing_lastname
                }}"

                required
            >
            @if ($errors->has('billing_lastname'))                                    
                <span class="has-error">
                    {{ $errors->first('billing_lastname') }}
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('billing_email') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.email') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="billing_email" 
                class="form-control"
                value="{{ 
                    old('billing_email') ?:
                    $vt->billing_email
                }}"
                required
            >
            @if ($errors->has('billing_email'))                                    
                <span class="has-error">
                    {{ $errors->first('billing_email') }}
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('billing_mobile') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.mobile') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="billing_mobile" 
                class="form-control"
                value="{{ 
                    old('billing_mobile') ?:
                    $vt->billing_mobile
                }}"
                required
            >
            @if ($errors->has('billing_mobile'))                                    
                <span class="has-error">
                    {{ $errors->first('billing_mobile') }}
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('billing_address') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.address') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="billing_address" 
                class="form-control"
                value="{{ 
                    old('billing_address') ?:
                    $vt->billing_address
                }}"

                required
            >
            @if ($errors->has('billing_address'))                                    
                <span class="has-error">
                    {{ $errors->first('billing_address') }}
                </span>
            @endif
        </div>
    </div>
</div>
</div>