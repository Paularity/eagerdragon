<div class="col-md-8">
    <div class="card card-block sameheight-item">                    
        {{ csrf_field() }}        
        @if(session()->has('success'))
            <div class="alert alert-success fade in alert-dismissable">
                {{ session()->get('success') }}
            </div>
        @endif  
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                    <label class="control-label">
                        Firstname <span class="required">*</span>
                    </label>
                    <input type="text" 
                        name="firstname" 
                        class="form-control underlined"
                        value="{{ old('firstname') }}"
                        required
                    >
                    @if ($errors->has('firstname'))                                    
                        <span class="has-error">
                            {{ $errors->first('firstname') }}
                        </span>
                    @endif
                </div> 
            </div>
            <div class="col-md-12">
                <div class="form-group {{$errors->has('lastname') ? 'has-error' : ''}}">            
                    <label class="control-label">
                        Lastname <span class="required">*</span>
                    </label>
                    <input type="text" 
                        name="lastname" 
                        class="form-control underlined"
                        value="{{ old('lastname') }}"
                        required
                    > 
                    @if ($errors->has('lastname'))                                    
                        <span class="has-error">
                            {{ $errors->first('lastname') }}
                        </span>
                    @endif
                </div>
            </div>    
            <div class="col-md-12">
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">            
                    <label class="control-label">
                        Email <span class="required">*</span>
                    </label>
                    <input type="email" 
                        name="email" 
                        class="form-control underlined"
                        value="{{ old('email') }}"
                        required
                    > 
                    @if ($errors->has('email'))                                    
                        <span class="has-error">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">            
                    <label class="control-label">
                        Username <span class="required">*</span>
                    </label>
                    <input type="text" 
                        name="username" 
                        class="form-control underlined"
                        value="{{ old('username') }}"                        
                        required
                    > 
                    @if ($errors->has('username'))                                    
                        <span class="has-error">
                            {{ $errors->first('username') }}
                        </span>
                    @endif
                </div>
            </div>    
            <div class="col-md-12">
                <div class="form-group {{$errors->has('mobile_number') ? 'has-error' : ''}}">            
                    <label class="control-label">
                        Mobile Number <span class="required">*</span>
                    </label>
                    <input type="text" 
                        name="mobile_number" 
                        class="form-control underlined"
                        value="{{ old('mobile_number') }}"
                    > 
                    @if ($errors->has('mobile_number'))                                    
                        <span class="has-error">
                            {{ $errors->first('mobile_number') }}
                        </span>
                    @endif
                </div>
            </div>            
            <div class="col-md-6">
                <div class="form-group {{ !$errors->has('role') ?: 'has-error' }}"> 
                    <label class="control-label">
                        Role <span class="required">*</span>
                    </label>                         
                    <select class="user-role form-control underlined" name="role" required>
                        <option value=""> Select Role </option>
                        @foreach($rolesList as $role)
                            <option value="{{$role->name}}" 
                                @if ( old('role') === $role->name )
                                    selected 
                                @endif
                                >
                                {{ $role->title }}
                            </option> 
                        @endforeach  
                    </select>                     
                    @if ($errors->has('role'))                                    
                        <span class="has-error">
                            {{ $errors->first('role') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>                      
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $('.user-role').change(function() {
            $('.all-ability').prop('checked', false);
            var role = $(this).val();
            console.log(role);
            if (role === 'master-admin') {
                $('.all-ability').prop('checked', true);
            }

            if (role === 'merchant-admin') {
                $('.user-view-reports').prop('checked', true);
                $('.user-process-chargebacks').prop('checked', true);
                $('.user-use-virtual-terminal').prop('checked', true);
            }

            if (role === 'merchant') {
                $('.user-view-reports').prop('checked', true);
                $('.user-process-chargebacks').prop('checked', true);
                $('.user-use-virtual-terminal').prop('checked', true);
                $('.user-view-statements').prop('checked', true);                
            }

            if (role === 'merchant-csr') {
                $('.user-use-virtual-terminal').prop('checked', true);
            }

            if (role === 'agent-admin') {
                $('.user-manage-merchants').prop('checked', true);
                $('.user-manage-agents').prop('checked', true);
                $('.user-edit-fees').prop('checked', true);
                $('.user-view-reports').prop('checked', true);
                $('.user-view-statements').prop('checked', true);                
            }

            if (role === 'agent') {
                $('.user-manage-merchants').prop('checked', true);
                $('.user-manage-agents').prop('checked', true);
                $('.user-view-reports').prop('checked', true);
                $('.user-view-statements').prop('checked', true);                
            }
        });
    });
</script>
@endpush