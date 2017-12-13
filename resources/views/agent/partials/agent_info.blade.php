<div class="col-md-12">
<div class="card sameheight-item" data-exclude="xs" style="height: 322px;">
    <div class="card-header card-header-lg bordered">
        <div class="header-block">
            <h3 class="title">Agent Information</h3> 
        </div>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Firstname</label>
                    <input type="text" 
                        name="firstname" 
                        class="form-control underlined"
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
            <div class="col-md-4">
                <div class="form-group">            
                    <label class="control-label">Lastname</label>
                    <input type="text" 
                        name="lastname" 
                        class="form-control underlined"
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
            <div class="col-md-4">
                <div class="form-group">            
                    <label class="control-label">Company</label>
                    <input type="text" 
                        name="company" 
                        class="form-control underlined"
                        @if (old('company'))
                            value="{{ old('company') }}"
                        @elseif (isset($user))
                            value="{{ $user->agent->company }}"
                        @endif
                        required
                    > 
                    @if ($errors->has('company'))                                    
                        <span class="has-error">
                            {{ $errors->first('company') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">            
                    <label class="control-label">Email</label>
                    <input type="email" 
                        name="email" 
                        class="form-control underlined"
                        @if (old('email'))
                            value="{{ old('email') }}"
                        @elseif (isset($user))
                            value="{{ $user->email }}"
                        @endif
                        required
                    > 
                    @if ($errors->has('email'))                                    
                        <span class="has-error">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">            
                    <label class="control-label">Username</label>
                    <input type="text" 
                        name="username" 
                        class="form-control underlined"
                        @if (old('username'))
                            value="{{ old('username') }}"
                        @elseif (isset($user))
                            value="{{ $user->username }}"
                        @endif                        
                        required
                    > 
                    @if ($errors->has('username'))                                    
                        <span class="has-error">
                            {{ $errors->first('username') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">            
                    <label class="control-label">Mobile Number</label>
                    <input type="text" 
                        name="mobile_number" 
                        class="form-control underlined"
                        @if (old('mobile_number'))
                            value="{{ old('mobile_number') }}"
                        @elseif (isset($user))
                            value="{{ $user->profile->mobile_number }}"
                        @endif
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
                <div class="form-group"> 
                    <label class="control-label">Role</label>                         
                    <select class="form-control underlined" name="role" required>
                        @foreach($rolesList as $role)
                            <option value="{{$role->name}}" 
                                @if (
                                    old('status') === $role->name ||
                                    isset($user) && 
                                    count($user->roles) > 0 &&
                                    $role->name === $user->roles[0]['name']
                                )
                                    selected 
                                @endif
                                >
                                {{$role->name}}  
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

</div>
</div>
