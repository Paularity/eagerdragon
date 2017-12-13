    <div class="card card-block sameheight-item">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('merchant_id') ? 'has-error' : ''}}">
                <label class="control-label">
                    {{ trans('app.merchants') }} <span class="required">*</span>
                </label>
                <select required name="merchant_id" class="form-control">
                    <option value="">Select Merchant</option>
                    @foreach ($merchantList as $merchant)
                        <option value="{{ $merchant->id }}"
                            @if ($customer->merchant_id == $merchant->id)
                                selected
                            @endif
                        >
                            {{ $merchant->firstname }}
                            {{ $merchant->lastname }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('merchant_id'))
                    <span class="has-error">
                        {{ $errors->first('merchant_id') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label class="control-label">
                    {{ trans('app.email') }} <span class="required">*</span>
                </label>
                <input type="email"
                    name="email"
                    class="form-control"
                    value="{{ $customer->email }}" 
                    required
                >
                @if ($errors->has('email'))
                    <span class="has-error">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                <label class="control-label">
                    {{ trans('app.first_name') }} <span class="required">*</span>
                </label>
                <input type="text"
                    name="firstname"
                    class="form-control"
                    value="{{ $customer->firstname }}" 
                    required
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
                    {{ trans('app.last_name') }} <span class="required">*</span>
                </label>
                <input type="text"
                    name="lastname"
                    class="form-control"
                    value="{{ $customer->lastname }}"
                    required
                >
                @if ($errors->has('lastname'))
                    <span class="has-error">
                        {{ $errors->first('lastname') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                <label class="control-label">
                    {{ trans('app.phone') }} <span class="required">*</span>
                </label>
                <input type="text"
                    name="phone"
                    class="form-control"
                    value="{{ $customer->phone }}"
                    required
                >
                @if ($errors->has('phone'))
                    <span class="has-error">
                        {{ $errors->first('phone') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('country') ? 'has-error' : ''}}">
                <label class="control-label">
                    Country <span class="required">*</span>
                </label>
                <select name="country" class="form-control">
                @foreach ($countryList as $key => $country)
                    <option value="{{ $key }}"
                        @if (old('country') === $key ||
                            $customer->country == $key)
                            selected
                        @endif 
                    >
                        {{ $country }}
                    </option>
                @endforeach
                </select>
                @if ($errors->has('country'))
                    <span class="has-error">
                        {{ $errors->first('country') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('address1') ? 'has-error' : ''}}">
                <label class="control-label">
                    Address <span class="required">*</span>
                </label>
                <input type="address1"
                    name="address1"
                    class="form-control"
                    value="{{ $customer->address1 }}"
                    required
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
                <input type="address2"
                    name="address2"
                    class="form-control"
                    value="{{ $customer->address2 }}"
                >
                @if ($errors->has('address2'))
                    <span class="has-error">
                        {{ $errors->first('address2') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('us_state') ? 'has-error' : ''}}">
                <label class="control-label">
                    State <span class="required">*</span>
                </label>
                <select name="us_state" class="form-control">
                @foreach ($statesList as $key => $state)
                    <option value="{{ $key }}"
                        @if (old('us_state') === $key ||
                            $key == $customer->us_state)
                            selected 
                        @endif
                    >
                        {{ $state }}
                    </option>
                @endforeach
                </select>
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
                <input type="city"
                    name="city"
                    class="form-control"
                    value="{{ $customer->city }}"
                    required
                >
                @if ($errors->has('city'))
                    <span class="has-error">
                        {{ $errors->first('city') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('zippostal_code') ? 'has-error' : ''}}">
                <label class="control-label">
                    ZIP/Postal Code <span class="required">*</span>
                </label>
                <input type="zippostal_code"
                    name="zippostal_code"
                    class="form-control"
                    value="{{ $customer->zippostal_code }}"
                    required
                >
                @if ($errors->has('zippostal_code'))
                    <span class="has-error">
                        {{ $errors->first('zippostal_code') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('timezone') ? 'has-error' : ''}}">
                <label class="control-label">
                    Timezone <span class="required">*</span>
                </label>
                <select name="timezone" class="form-control">
                @foreach ($timezones as $key => $tz)
                    <option value="{{ $key }}"
                        @if (old('timezone') === $key ||
                            $key == $customer->timezone ||
                            $key === 'GMT -5:00')
                            selected
                        @endif 
                    >
                        {{ $tz }}
                    </option>
                @endforeach
                </select>
                @if ($errors->has('timezone'))
                    <span class="has-error">
                        {{ $errors->first('timezone') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <br/>
                <button type="submit" class="btn btn-block btn-primary">
                    {{ trans('app.submit') }}
                </button>
            </div>
        </div>
    </div>
</div>