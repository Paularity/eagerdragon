<div class="card card-block card-success">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.credit_card_information') }}</h3>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('credit_card_number') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.credit_card_number') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="credit_card_number" 
                class="form-control cc-number"
                value="{{ old('credit_card_number') }}"
                required
            >
            @if ($errors->has('credit_card_number'))                                    
                <span class="has-error">
                    {{ $errors->first('credit_card_number') }}
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('credit_card_cvv') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.credit_card_cvv') }} <span class="required">*</span>
            </label>
            <input type="tel" 
                name="credit_card_cvv" 
                class="form-control"
                value="{{ old('credit_card_cvv') }}"
                required
            >
            @if ($errors->has('credit_card_cvv'))                                    
                <span class="has-error">
                    {{ $errors->first('credit_card_cvv') }}
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('credit_card_expiration_year') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.credit_card_expiration_year') }} <span class="required">*</span>
            </label>
            <select name="credit_card_expiration_year"
                class="form-control">
                @for($y = date('Y'); $y <= date('Y', strtotime('+10 years')); $y++)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endfor
            </select>
            @if ($errors->has('credit_card_expiration_year'))                                    
                <span class="has-error">
                    {{ $errors->first('credit_card_expiration_year') }}
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{$errors->has('credit_card_expiration_month') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.credit_card_expiration_month') }} <span class="required">*</span>
            </label>
            <select name="credit_card_expiration_month"
                class="form-control">
                @foreach ($expirationMonth as $key => $month)
                    <option value="{{ $key }}"
                        @if ($month === date('M'))
                            selected
                        @endif
                    >
                        {{ $month }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('credit_card_expiration_month'))                                    
                <span class="has-error">
                    {{ $errors->first('credit_card_expiration_month') }}
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group authorization_code {{$errors->has('authorization_code') ? 'has-error' : ''}}" style="display: none;">
            <label class="control-label">
                {{ trans('app.authorization_code') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="authorization_code" 
                class="form-control"
                value="{{ old('authorization_code') }}"
            >
            @if ($errors->has('authorization_code'))                                    
                <span class="has-error">
                    {{ $errors->first('authorization_code') }}
                </span>
            @endif
        </div>

        <div class="form-group original_transaction_id {{$errors->has('original_transaction_id') ? 'has-error' : ''}}" style="display: none;">
            <label class="control-label">
                {{ trans('app.original_transaction_id') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="original_transaction_id" 
                class="form-control"
                value="{{ old('original_transaction_id') }}"
            >
            @if ($errors->has('original_transaction_id'))                                    
                <span class="has-error">
                    {{ $errors->first('original_transaction_id') }}
                </span>
            @endif
        </div>
    </div>
</div>
</div>

@push('scripts')
<script>
    $(function() {
        $('.cc-number').keyup(function(e) {
          e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
        });
    })
</script>
@endpush