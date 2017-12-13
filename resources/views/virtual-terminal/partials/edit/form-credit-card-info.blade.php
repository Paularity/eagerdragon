<div class="card card-block">
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
                class="form-control underlined"
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
            <input type="text" 
                name="credit_card_cvv" 
                class="form-control underlined"
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
                class="form-control underlined">
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
                class="form-control underlined">
                @foreach ($expirationMonth as $k => $v)
                    <option value="{{ $k }}">
                        {{ $v }}
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
</div>