<div class="card card-block sameheight-item">                    
    {{ csrf_field() }}  
    <input name="_method" type="hidden" value="PATCH">
    <input name="user_id" type="hidden" value="{{ $csr->id }}"> 
         
    @if(session()->has('success'))
        <div class="alert alert-success fade in alert-dismissable">
            {{ session()->get('success') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    Agent <span class="required">*</span>
                </label>
                <select name="agent_id" class="form-control underlined">
                    <option value="">Select Agent</option>
                    @foreach($agentList as $agent)
                        <option value="{{ $agent->id }}" 
                            @if ( 
                                    old('agent_id') == $agent->user_id ||
                                    $csr->agentAccount->user['id'] == $agent->user_id 
                                )
                                selected
                            @endif
                        >
                                {{ $agent->user['firstname'] }}  
                                {{ $agent->user['lastname'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>   
        <div class="col-md-6">
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Email <span class="required">*</span>
                </label>
                <input type="email" 
                    name="email" 
                    class="form-control underlined"
                    @if (old('email'))
                        value="{{ old('email') }}"
                    @elseif (isset($csr))
                        value="{{ $csr->email }}"
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
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                <label class="control-label">
                    Firstname <span class="required">*</span>
                </label>
                <input type="text" 
                    name="firstname" 
                    class="form-control underlined"
                    @if (old('firstname'))
                        value="{{ old('firstname') }}"
                    @elseif (isset($csr))
                        value="{{ $csr->firstname }}"
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
                    class="form-control underlined"
                    @if (old('lastname'))
                        value="{{ old('lastname') }}"
                    @elseif (isset($csr))
                        value="{{ $csr->lastname }}"
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
            <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Address <span class="required">*</span>
                </label>
                <input type="text" 
                    name="address" 
                    class="form-control underlined"
                    @if (old('address'))
                        value="{{ old('address') }}"
                    @elseif (isset($csr))
                        value="{{ $csr->address }}"
                    @endif
                    required
                > 
                @if ($errors->has('address'))                                    
                    <span class="has-error">
                        {{ $errors->first('address') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('mobile') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Mobile <span class="required">*</span>
                </label>
                <input type="text" 
                    name="mobile" 
                    class="form-control underlined"
                    @if (old('mobile'))
                        value="{{ old('mobile') }}"
                    @elseif (isset($csr))
                        value="{{ $csr->mobile }}"
                    @endif
                > 
                @if ($errors->has('mobile'))                                    
                    <span class="has-error">
                        {{ $errors->first('mobile') }}
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
                    Submit
                </button> 
            </div>
        </div>  
    </div>                      
</div>