<div class="card card-block">
    <div class="form-group">
        <h3 class="title"> Bank Information </h3>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group {{$errors->has('account_name') ? 'has-error' : ''}}">
                <label class="control-label">
                    Account Name <span class="required">*</span>
                </label>
                <input type="text"
                    name="account_name"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $bankInfo->account_name
                        ?: old('account_name')
                    }}"
                    required
                >
                @if ($errors->has('account_name'))
                    <span class="has-error">
                        {{ $errors->first('account_name') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group {{$errors->has('account_number') ? 'has-error' : ''}}">
                <label class="control-label">
                    Account Number <span class="required">*</span>
                </label>
                <input type="text"
                    name="account_number"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $bankInfo->account_number
                        ?: old('account_number')
                    }}"
                    required
                >
                @if ($errors->has('account_number'))
                    <span class="has-error">
                        {{ $errors->first('account_number') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group {{$errors->has('routing_number') ? 'has-error' : ''}}">
                <label class="control-label">
                    Routing Number <span class="required">*</span>
                </label>
                <input type="text"
                    name="routing_number"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $bankInfo->routing_number
                        ?: old('routing_number')
                    }}"
                    required
                >
                @if ($errors->has('routing_number'))
                    <span class="has-error">
                        {{ $errors->first('routing_number') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group {{$errors->has('tax_id') ? 'has-error' : ''}}">
                <label class="control-label">
                    Tax ID <span class="required">*</span>
                </label>
                <input type="text"
                    name="tax_id"
                    class="form-control underlined form-control-sm"
                    value="{{
                        $bankInfo->tax_id
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