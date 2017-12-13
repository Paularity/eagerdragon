<div class="card card-block">
    <div class="card-title-block">
        <h3 class="title">Commission Payment Information</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('account_number') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Account Number <span class="required">*</span>
                </label>
                <input type="text" 
                    name="account_number" 
                    class="form-control"
                    value="{{ old('account_number') }}"
                > 
                @if ($errors->has('account_number'))                                    
                    <span class="has-error">
                        {{ $errors->first('account_number') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{$errors->has('legal_name') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Legal Name (Name on Tax Return) <span class="required">*</span>
                </label>
                <input type="text" 
                    name="legal_name" 
                    class="form-control"
                    value="{{ old('legal_name') }}"
                > 
                @if ($errors->has('legal_name'))                                    
                    <span class="has-error">
                        {{ $errors->first('legal_name') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('tax_id') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Tax ID (EIN or SSN) <span class="required">*</span>
                </label>
                <input type="text" 
                    name="tax_id" 
                    class="form-control"
                    value="{{ old('tax_id') }}"
                > 
                @if ($errors->has('tax_id'))                                    
                    <span class="has-error">
                        {{ $errors->first('tax_id') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{$errors->has('business_type') ? 'has-error' : ''}}">            
                <label class="control-label">
                    Business Type <span class="required">*</span>
                </label>
                <select name="business_type" class="form-control">
                    @foreach ($businessType as $key => $bs)
                        <option value="{{ $key }}"
                            @if (old('business_type') === $key )
                                selected
                            @endif 
                        >
                            {{ $bs }}
                        </option>
                    @endforeach
                </select> 
                @if ($errors->has('business_type'))                                    
                    <span class="has-error">
                        {{ $errors->first('business_type') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('swift_routing_number') ? 'has-error' : ''}}">            
                <label class="control-label">
                    ABA\Swift Routing Number <span class="required">*</span>
                </label>
                <input type="text" 
                    name="swift_routing_number" 
                    class="form-control"
                    value="{{ old('swift_routing_number') }}"
                >
                
                <span class="small">The Legal Company Name, 
                Business Type and Tax ID must match the 
                name on the bank account information above.</span> 
                
                @if ($errors->has('swift_routing_number'))                                    
                    <span class="has-error">
                        {{ $errors->first('swift_routing_number') }}
                    </span>
                @endif
            </div>
        </div>            
    </div>
</div>