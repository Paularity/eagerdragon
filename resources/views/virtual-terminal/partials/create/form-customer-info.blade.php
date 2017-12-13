<div class="card card-block card-success">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.customer_billing_information') }}</h3>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('customer_id') ? 'has-error' : ''}}">
                <select name="customer_id" 
                    @change="fetchCustomer"
                    v-model="customerId"
                    class="form-control">
                        <option value="" hidden>Select Customer</option>
                    @foreach ($customerList as $customer)
                        <option value="{{ $customer->id }}">
                            {{ $customer->firstname }} 
                            {{ $customer->lastname }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <button type="button" 
                class="btn btn-primary btn-block" 
                data-toggle="modal" 
                data-target="#newCustomer">
                {{ trans('app.add_new') }}
            </button>
        </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.firstname') }} <span class="required">*</span>
            </label>
            <input type="text"
                v-model="customer.firstname"
                name="firstname" 
                class="form-control"
                required
                readonly 
            >
            @if ($errors->has('firstname'))                                    
                <span class="has-error">
                    {{ $errors->first('firstname') }}
                </span>
            @endif
        </div>        
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('lastname') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.lastname') }} <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="customer.lastname"
                name="lastname" 
                class="form-control"
                required
                readonly
            >
            @if ($errors->has('lastname'))                                    
                <span class="has-error">
                    {{ $errors->first('lastname') }}
                </span>
            @endif
        </div>        
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.email') }} <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="customer.email"
                name="email" 
                class="form-control"
                required
                readonly
            >
            @if ($errors->has('email'))                                    
                <span class="has-error">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.phone') }} <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="customer.phone"
                name="phone" 
                class="form-control"
                required
                readonly
            >
            @if ($errors->has('phone'))                                    
                <span class="has-error">
                    {{ $errors->first('phone') }}
                </span>
            @endif
        </div>        
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('address1') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.address') }} <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="customer.address1"
                name="address1" 
                class="form-control"
                value="{{ old('address1') }}"
                required
                readonly
            >
            @if ($errors->has('address1'))                                    
                <span class="has-error">
                    {{ $errors->first('address1') }}
                </span>
            @endif
        </div>          
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('address2') ? 'has-error' : ''}}">
            <label class="control-label">
                Address (cont.)
            </label>
            <input type="text" 
                v-model="customer.address2"
                name="address2" 
                class="form-control"
                required
                readonly
            >
            @if ($errors->has('address2'))                                    
                <span class="has-error">
                    {{ $errors->first('address2') }}
                </span>
            @endif
        </div>          
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('country') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.address') }} <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="customer.country"
                name="country" 
                class="form-control"
                required
                readonly
            >
            @if ($errors->has('country'))                                    
                <span class="has-error">
                    {{ $errors->first('country') }}
                </span>
            @endif
        </div>          
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('us_state') ? 'has-error' : ''}}">
            <label class="control-label">
                State <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="customer.us_state"
                name="us_state" 
                class="form-control"
                required
                readonly
            >
            @if ($errors->has('us_state'))                                    
                <span class="has-error">
                    {{ $errors->first('us_state') }}
                </span>
            @endif
        </div>          
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('city') ? 'has-error' : ''}}">
            <label class="control-label">
                City <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="customer.city"
                name="city" 
                class="form-control"
                required
                readonly
            >
            @if ($errors->has('city'))                                    
                <span class="has-error">
                    {{ $errors->first('city') }}
                </span>
            @endif
        </div>          
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('zippostal_code') ? 'has-error' : ''}}">
            <label class="control-label">
                ZIP/Postal Code <span class="required">*</span>
            </label>
            <input type="text" 
                v-model="customer.zippostal_code"
                name="zippostal_code" 
                class="form-control"
                required
                readonly
            >
            @if ($errors->has('zippostal_code'))                                    
                <span class="has-error">
                    {{ $errors->first('zippostal_code') }}
                </span>
            @endif
        </div>          
    </div>
</div>
</div>