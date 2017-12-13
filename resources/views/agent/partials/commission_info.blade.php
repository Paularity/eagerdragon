<div class="col-md-12">
<div class="card" data-exclude="xs">
<div class="card-header card-header-sm bordered">
    <div class="header-block">
         <h3 class="title">Commission Payment Information</h3>
    </div>
</div>
<div class="card-block">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('bank_name') ? 'has-error' : ''}}">
                <label class="control-label">Bank Name</label>
                <input type="text"
                    name="bank_name"
                    class="form-control underlined"
                    value="{{
                        $commission->bank_name
                        ?: old('bank_name')
                    }}"
                    required
                >
                @if ($errors->has('bank_name'))
                    <span class="has-error">
                        {{ $errors->first('bank_name') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('account_no') ? 'has-error' : ''}}">
                <label class="control-label">Account Number</label>
                <input type="text"
                    name="account_no"
                    class="form-control underlined"
                    value="{{
                        $commission->account_no
                        ?: old('account_no')
                    }}"
                    required
                >
                @if ($errors->has('account_no'))
                    <span class="has-error">
                        {{ $errors->first('account_no') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('routing_no') ? 'has-error' : ''}}">
                <label class="control-label">ABA/Swift Routing Number</label>
                <input type="text"
                    name="routing_no"
                    class="form-control underlined"
                    value="{{
                        $commission->routing_no
                        ?: old('routing_no')
                    }}"
                    required
                >
                @if ($errors->has('routing_no'))
                    <span class="has-error">
                        {{ $errors->first('routing_no') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('legal_name') ? 'has-error' : ''}}">
                <label class="control-label">Legal Name (Name on Tax Return) </label>
                <input type="text"
                    name="legal_name"
                    class="form-control underlined"
                    value="{{
                        $commission->legal_name
                        ?: old('legal_name')
                    }}"
                    required
                >
                @if ($errors->has('legal_name'))
                    <span class="has-error">
                        {{ $errors->first('legal_name') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('business_type') ? 'has-error' : ''}}">
                <label class="control-label">Business Type</label>
                <input type="text"
                    name="business_type"
                    class="form-control underlined"
                    value="{{
                        $commission->business_type
                        ?: old('business_type')
                    }}"
                    required
                >
                @if ($errors->has('business_type'))
                    <span class="has-error">
                        {{ $errors->first('business_type') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('tax_id') ? 'has-error' : ''}}">
                <label class="control-label">Tax ID (EIN or SSN)</label>
                <input type="text"
                    name="tax_id"
                    class="form-control underlined"
                    value="{{
                        $commission->tax_id
                        ?: old('tax_id')
                    }}"
                    required
                >
                @if ($errors->has('tax_id'))
                    <span class="has-error">
                        {{ $errors->first('tax_id') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>