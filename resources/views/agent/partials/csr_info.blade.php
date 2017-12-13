<div class="col-md-12">
<div class="card sameheight-item" data-exclude="xs" style="height: 322px;">
    <div class="card-header card-header-sm bordered">
        <div class="header-block">
            <h3 class="title">Customer Service Representative</h3> 
        </div>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{$errors->has('csr_fname') ? 'has-error' : ''}}">
                    <label class="control-label">CSR Firstname</label>
                    <input type="text" 
                        name="csr_fname" 
                        class="form-control underlined"
                        @if (old('csr_fname'))
                            value="{{ old('csr_fname') }}"
                        @elseif (isset($user))
                            value="{{ $csr->firstname }}"
                        @endif
                        required 
                    >
                    @if ($errors->has('csr_fname'))                                    
                        <span class="has-error">
                            {{ $errors->first('csr_fname') }}
                        </span>
                    @endif
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group {{$errors->has('csr_lname') ? 'has-error' : ''}}">
                    <label class="control-label">CSR Lastname</label>
                    <input type="text" 
                        name="csr_lname" 
                        class="form-control underlined"
                        @if (old('csr_lname'))
                            value="{{ old('csr_lname') }}"
                        @elseif (isset($user))
                            value="{{ $csr->lastname }}"
                        @endif
                        required 
                    >
                    @if ($errors->has('csr_lname'))                                    
                        <span class="has-error">
                            {{ $errors->first('csr_lname') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{$errors->has('csr_email') ? 'has-error' : ''}}">
                    <label class="control-label">CSR Email</label>
                    <input type="email" 
                        name="csr_email" 
                        class="form-control underlined"
                        @if (old('csr_email'))
                            value="{{ old('csr_email') }}"
                        @elseif (isset($user))
                            value="{{ $csr->lastname }}"
                        @endif
                        required 
                    >
                    @if ($errors->has('csr_email'))                                    
                        <span class="has-error">
                            {{ $errors->first('csr_email') }}
                        </span>
                    @endif
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group {{$errors->has('csr_phone') ? 'has-error' : ''}}">
                    <label class="control-label">CSR Phone Number</label>
                    <input type="text" 
                        name="csr_phone" 
                        class="form-control underlined"
                        @if (old('csr_phone'))
                            value="{{ old('csr_phone') }}"
                        @elseif (isset($user))
                            value="{{ $csr->phone }}"
                        @endif
                        required 
                    >
                    @if ($errors->has('csr_phone'))                                    
                        <span class="has-error">
                            {{ $errors->first('csr_phone') }}
                        </span>
                    @endif
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{$errors->has('csr_fax') ? 'has-error' : ''}}">
                    <label class="control-label">CSR Fax Number</label>
                    <input type="text" 
                        name="csr_fax" 
                        class="form-control underlined"
                        @if (old('csr_fax'))
                            value="{{ old('csr_fax') }}"
                        @elseif (isset($user))
                            value="{{ $csr->fax }}"
                        @endif
                        required 
                    >
                    @if ($errors->has('csr_fax'))                                    
                        <span class="has-error">
                            {{ $errors->first('csr_fax') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ !$errors->has('csr_role') ?: 'has-error' }}"> 
                    <label class="control-label">Role</label>                         
                    <input value="Agent CSR" type="text" class="form-control underlined" name="csr_role" required readonly>                
                    @if ($errors->has('csr_role'))                                    
                        <span class="has-error">
                            {{ $errors->first('csr_role') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
</div>
