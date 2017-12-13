<div class="card card-block">
    <div class="card-title-block">
        <h3 class="title">Basic Information</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                <label class="control-label">
                    Firstname <span class="required">*</span>
                </label>
                <input type="text" 
                    name="firstname" 
                    class="form-control"
                    @if (old('firstname'))
                        value="{{ old('firstname') }}"
                    @elseif (isset($user))
                        value="{{ $user->firstname }}"
                    @endif
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
                    Lastname <span class="required">*</span>
                </label>
                <input type="text" 
                    name="lastname" 
                    class="form-control"
                    @if (old('lastname'))
                        value="{{ old('lastname') }}"
                    @elseif (isset($user))
                        value="{{ $user->lastname }}"
                    @endif
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
            <div class="form-group {{$errors->has('address1') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Address <span class="required">*</span>
                </label>
                <input type="text" 
                    name="address1" 
                    class="form-control"
                    @if (old('address1'))
                        value="{{ old('address1') }}"
                    @elseif (isset($user))
                        value="{{ $user->agentAccount['address1'] }}"
                    @endif
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
            <div class="form-group {{$errors->has('mobile_number') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Mobile Number <span class="required">*</span>
                </label>
                <input type="text" 
                    name="mobile_number" 
                    class="form-control"
                    @if (old('mobile_number'))
                        value="{{ old('mobile_number') }}"
                    @elseif (isset($user))
                        value="{{ $user->mobile_number }}"
                    @endif
                > 
                @if ($errors->has('mobile_number'))                                    
                    <span class="has-error">
                        {{ $errors->first('mobile_number') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('business_name') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Business Name <span class="required">*</span>
                </label>
                <input type="text" 
                    name="business_name" 
                    class="form-control"
                    @if (old('business_name'))
                        value="{{ old('business_name') }}"
                    @elseif (isset($user))
                        value="{{ $user->agentAccount['business_name'] }}"
                    @endif
                    required
                > 
                @if ($errors->has('business_name'))                                    
                    <span class="has-error">
                        {{ $errors->first('business_name') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
              <div class="form-group {{$errors->has('website') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Website URL <span class="required">*</span>
                </label>
                <input type="text" 
                    name="website" 
                    class="form-control"
                    @if (old('website'))
                        value="{{ old('website') }}"
                    @elseif (isset($user))
                        value="{{ $user->agentAccount['website'] }}"
                    @endif
                    required
                > 
                @if ($errors->has('website'))                                    
                    <span class="has-error">
                        {{ $errors->first('website') }}
                    </span>
                @endif
            </div>
        </div>            
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('country') ? 'has-error' : ''}}">
                <label class="control-label">
                    Country
                </label>
                <select name="country" class="form-control">
                @foreach ($countryList as $key => $country)
                    <option value="{{$key}}"
                        @if (
                            old('country') === $key ||
                            isset($user) && $key == 
                            $user->agentAccount['country']
                            )
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
        <div class="col-md-6">
            <div class="form-group {{$errors->has('country') ? 'has-error' : ''}}">
                <label class="control-label">
                    State
                </label>
                <select name="us_state" class="form-control">
                @foreach($statesList as $key => $states)
                    <option value="{{$key}}"
                        @if (
                            old('us_state') === $key ||
                            isset($user) && $key == 
                            $user->agentAccount['us_state']
                            )
                            selected
                        @endif
                        >
                        {{ $states }}
                    </option>
                @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
             <div class="form-group {{$errors->has('city') ? 'has-error' : ''}}">            
                <label class="control-label">
                    City <span class="required">*</span>
                </label>
                <input type="text" 
                    name="city" 
                    class="form-control"
                    @if (old('city'))
                        value="{{ old('city') }}"
                    @elseif (isset($user))
                        value="{{ $user->agentAccount['city'] }}"
                    @endif
                    required
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
                    Zip/Postal Code <span class="required">*</span>
                </label>
                <input type="text" 
                    name="zippostal_code" 
                    class="form-control"
                    @if (old('zippostal_code'))
                        value="{{ old('zippostal_code') }}"
                    @elseif (isset($user))
                        value="{{ $user->agentAccount['zippostal_code'] }}"
                    @endif
                    required
                > 
                @if ($errors->has('zippostal_code'))                                    
                    <span class="has-error">
                        {{ $errors->first('zippostal_code') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
             <div class="form-group {{$errors->has('timezone') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Timezone <span class="required">*</span>
                </label>
                <select name="timezone" class="form-control">
                @foreach ($timezones as $key => $tz)
                    <option value="{{ $key }}"
                        @if (
                            old('timezone') === $key ||
                            isset($user) && $key ==
                            $user->agentAccount['timezone']
                            )
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
        <div class="col-md-6">
            <div class="form-group {{$errors->has('status') ? 'has-error' : ''}}"> 
                <label class="control-label">
                    Status <span class="required">*</span>
                </label>                         
                <select class="form-control" name="status" required>
                    <option value=""> Select Status </option>
                    @foreach($userPresetStatus as $status)
                        <option value="{{ $status }}" 
                            @if (
                                    old('status') === $status || 
                                    isset($user) &&
                                    $user->status === $status
                                )
                                    selected
                                @endif
                        >
                            {{ ucfirst($status) }}  
                        </option> 
                    @endforeach                           
                </select>
                @if ($errors->has('status'))                                    
                    <span class="has-error">
                        {{ $errors->first('status') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>