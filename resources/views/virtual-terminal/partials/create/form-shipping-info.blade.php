<div class="card card-block card-success">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.shipping_address') }}</h3>
</div>

<div class="row">
    <div class="col-md-12">
        <label class="checkbox-inline">
            <input @click="sameShipping" type="checkbox" v-model="checked">
            The shipping address is the same as the billing address.
        </label>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_firstname') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.firstname') }} <span class="required">*</span>
            </label>
            <input type="text"
                v-model="cc.firstname"
                name="shipping_firstname" 
                class="form-control"
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
                v-model="cc.lastname"
                name="shipping_lastname" 
                class="form-control"
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
                v-model="cc.email"
                name="shipping_email" 
                class="form-control"
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
        <div class="form-group {{$errors->has('shipping_phone') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.phone') }} <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="cc.phone"
                name="shipping_phone" 
                class="form-control"
                required
            >
            @if ($errors->has('shipping_phone'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_phone') }}
                </span>
            @endif
        </div>        
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_address1') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.address') }} <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="cc.address1"
                name="shipping_address1" 
                class="form-control"
                required
            >
            @if ($errors->has('shipping_address1'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_address1') }}
                </span>
            @endif
        </div>          
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_address2') ? 'has-error' : ''}}">
            <label class="control-label">
                Address (cont.)
            </label>
            <input type="text" 
                v-model="cc.address2"
                name="shipping_address2" 
                class="form-control"
            >
            @if ($errors->has('shipping_address2'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_address2') }}
                </span>
            @endif
        </div>          
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_country') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.address') }} <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="cc.country"
                name="shipping_country" 
                class="form-control"
                required
            >
            @if ($errors->has('shipping_country'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_country') }}
                </span>
            @endif
        </div>          
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_us_state') ? 'has-error' : ''}}">
            <label class="control-label">
                State <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="cc.us_state"
                name="shipping_us_state" 
                class="form-control"
                required
            >
            @if ($errors->has('shipping_us_state'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_us_state') }}
                </span>
            @endif
        </div>          
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_city') ? 'has-error' : ''}}">
            <label class="control-label">
                City <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="cc.city"
                name="shipping_city" 
                class="form-control"
                required
            >
            @if ($errors->has('shipping_city'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_city') }}
                </span>
            @endif
        </div>          
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('shipping_zippostal_code') ? 'has-error' : ''}}">
            <label class="control-label">
                ZIP/Postal Code <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="cc.zippostal_code"
                name="shipping_zippostal_code" 
                class="form-control"
                required
            >
            @if ($errors->has('shipping_zippostal_code'))                                    
                <span class="has-error">
                    {{ $errors->first('shipping_zippostal_code') }}
                </span>
            @endif
        </div>          
    </div>
</div>
