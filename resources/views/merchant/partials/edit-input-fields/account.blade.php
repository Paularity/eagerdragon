<div class="card card-block sameheight-item">
    <div class="form-group">
        <h3 class="title"> Merchant Account </h3>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group {{$errors->has('mid') ? 'has-error' : ''}}">
                <label class="control-label">
                    MID <span class="required">*</span>
                </label>
                <input type="text"
                    name="mid"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $account->mid
                        ?: old('mid')
                     }}"
                    required
                >
                @if ($errors->has('mid'))
                    <span class="has-error">
                        {{ $errors->first('mid') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                <label class="control-label">
                    Firstname <span class="required">*</span>
                </label>
                <input type="text"
                    name="firstname"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $merchant->firstname
                        ?: old('firstname')
                     }}"
                    required
                >
                @if ($errors->has('firstname'))
                    <span class="has-error">
                        {{ $errors->first('firstname') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group {{$errors->has('lastname') ? 'has-error' : ''}}">
                <label class="control-label">
                    Lastname <span class="required">*</span>
                </label>
                <input type="text"
                    name="lastname"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $merchant->lastname
                        ?: old('lastname')
                     }}"
                    required
                >
                @if ($errors->has('lastname'))
                    <span class="has-error">
                        {{ $errors->first('lastname') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label class="control-label">
                    Email <span class="required">*</span>
                </label>
                <input type="email"
                    name="email"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $merchant->email
                        ?: old('email')
                     }}"
                    required
                >
                @if ($errors->has('email'))
                    <span class="has-error">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
                <label class="control-label">
                    Username <span class="required">*</span>
                </label>
                <input type="text"
                    name="username"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $merchant->username
                        ?: old('username')
                     }}"
                    required
                >
                @if ($errors->has('username'))
                    <span class="has-error">
                        {{ $errors->first('username') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group {{$errors->has('mobile_number') ? 'has-error' : ''}}">
                <label class="control-label">
                    Mobile Number <span class="required">*</span>
                </label>
                <input type="text"
                    name="mobile_number"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $merchant->mobile_number
                        ?: old('mobile_number')
                     }}"
                    required
                >
                @if ($errors->has('mobile_number'))
                    <span class="has-error">
                        {{ $errors->first('mobile_number') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                <label class="control-label">
                    Address <span class="required">*</span>
                </label>
                <input type="text"
                    name="address"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $account->address
                        ?: old('address')
                     }}"
                    required
                >
                @if ($errors->has('address'))
                    <span class="has-error">
                        {{ $errors->first('address') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group
                {{$errors->has('city') ? 'has-error' : ''}}">
                <label class="control-label">
                    City <span class="required">*</span>
                </label>
                <input type="text"
                    name="city"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $account->city
                        ?: old('city')
                     }}"
                    required
                >
                @if ($errors->has('city'))
                    <span class="has-error">
                        {{ $errors->first('city') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group {{$errors->has('state') ? 'has-error' : ''}}">
                <label class="control-label">
                    State <span class="required">*</span>
                </label>
                <input type="text"
                    name="state"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $account->state
                        ?: old('state')
                     }}"
                    required
                >
                @if ($errors->has('state'))
                    <span class="has-error">
                        {{ $errors->first('state') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group
                {{$errors->has('zip') ? 'has-error' : ''}}">
                <label class="control-label">
                    Zip <span class="required">*</span>
                </label>
                <input type="text"
                    name="zip"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $account->zip
                        ?: old('zip')
                     }}"
                    required
                >
                @if ($errors->has('zip'))
                    <span class="has-error">
                        {{ $errors->first('zip') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group
                {{$errors->has('country') ? 'has-error' : ''}}">
                <label class="control-label">
                    Country <span class="required">*</span>
                </label>
                <select required class="form-control underlined form-control-sm"
                    name="country">
                    <option value="">
                        Select Country
                    </option>
                    @foreach ($countryList as $key => $value)
                        <option
                            @if ($account && $account->country === $key)
                                selected
                            @elseif($key === old('country'))
                                selected
                            @endif
                            value="{{ $key }}">
                            {{ $value }}
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
</div>