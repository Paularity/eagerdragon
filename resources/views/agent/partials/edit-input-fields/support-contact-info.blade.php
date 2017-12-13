<div class="card card-block">
    <div class="card-title-block">
        <h3 class="title">Agent Support Contact Information</h3>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<div class="form-group {{$errors->has('cs_firstname') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Support Person First Name <span class="required">*</span>
                </label>
                <input type="text" 
                    name="cs_firstname" 
                    class="form-control"
                    @if (old('cs_firstname'))
                        value="{{ old('cs_firstname') }}"
                    @elseif (isset($user))
                        value="{{ $user->agentAccount['cs_firstname'] }}"
                    @endif
                    required
                > 
                @if ($errors->has('cs_firstname'))                                    
                    <span class="has-error">
                        {{ $errors->first('cs_firstname') }}
                    </span>
                @endif
            </div>
    	</div>
    	<div class="col-md-6">
    		<div class="form-group {{$errors->has('cs_lastname') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Support Person Last Name <span class="required">*</span>
                </label>
                <input type="text" 
                    name="cs_lastname" 
                    class="form-control"
                    @if (old('cs_lastname'))
                        value="{{ old('cs_lastname') }}"
                    @elseif (isset($user))
                        value="{{ $user->agentAccount['cs_lastname'] }}"
                    @endif
                    required
                > 
                @if ($errors->has('cs_lastname'))                                    
                    <span class="has-error">
                        {{ $errors->first('cs_lastname') }}
                    </span>
                @endif
            </div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<div class="form-group {{$errors->has('cs_phone') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Support Person Phone Number <span class="required">*</span>
                </label>
                <input type="text" 
                    name="cs_phone" 
                    class="form-control"
                    @if (old('cs_phone'))
                        value="{{ old('cs_phone') }}"
                    @elseif (isset($user))
                        value="{{ $user->agentAccount['cs_phone'] }}"
                    @endif
                    required
                > 
                @if ($errors->has('cs_phone'))                                    
                    <span class="has-error">
                        {{ $errors->first('cs_phone') }}
                    </span>
                @endif
            </div>
    	</div>
    	<div class="col-md-6">
    		<div class="form-group {{$errors->has('cs_email') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Support Person Email <span class="required">*</span>
                </label>
                <input type="text" 
                    name="cs_email" 
                    class="form-control"
                    @if (old('cs_email'))
                        value="{{ old('cs_email') }}"
                    @elseif (isset($user))
                        value="{{ $user->agentAccount['cs_email'] }}"
                    @endif
                    required
                > 
                @if ($errors->has('cs_email'))                                    
                    <span class="has-error">
                        {{ $errors->first('cs_email') }}
                    </span>
                @endif
            </div>
    	</div>
    </div>
</div>