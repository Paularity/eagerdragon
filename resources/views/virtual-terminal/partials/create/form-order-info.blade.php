<div class="card card-block card-success">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.order_information') }}</h3>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('order_id') ? 'has-error' : ''}}">
            <label class="control-label">
                Order ID <span class="required">*</span>
            </label>
            <input type="text"
                name="order_id" 
                class="form-control"
                value="{{ old('order_id') }}"
                required
            >
            @if ($errors->has('order_id'))                                    
                <span class="has-error">
                    {{ $errors->first('order_id') }}
                </span>
            @endif
        </div>        
    </div>
    
    <div class="col-md-6">
        <div class="form-group {{$errors->has('order_description') ? 'has-error' : ''}}">
            <label class="control-label">
                Order Description <span class="required">*</span>
            </label>
            <input type="text" 
                name="order_description" 
                class="form-control"
                value="{{ old('order_description') }}"
                required
            >
            @if ($errors->has('order_description'))                                    
                <span class="has-error">
                    {{ $errors->first('order_description') }}
                </span>
            @endif
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group {{$errors->has('amount') ? 'has-error' : ''}}">
            <label class="control-label">
                Amount <span class="required">*</span>
            </label>
            <input type="text"
                name="amount" 
                class="form-control"
                value="{{ old('amount') }}"
                required
            >
            @if ($errors->has('amount'))                                    
                <span class="has-error">
                    {{ $errors->first('amount') }}
                </span>
            @endif
        </div> 
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('currency') ? 'has-error' : ''}}">
            <label class="control-label">
                Currency <span class="required">*</span>
            </label>
            <select name="currency" class="form-control">
            @foreach ($currencyList as $key => $currency)
                <option value="{{ $key }}"
                    @if (old('currency') === $key ||
                        $key == 'USD')
                        selected
                    @endif 
                >
                    {{ $currency }}
                </option>
            @endforeach
            </select>
            @if ($errors->has('currency'))                                    
                <span class="has-error">
                    {{ $errors->first('currency') }}
                </span>
            @endif
        </div> 
    </div>
    <div class="col-md-4">
        <div class="form-group {{$errors->has('tax') ? 'has-error' : ''}}">
            <label class="control-label">
                Tax <span class="required">*</span>
            </label>
            <input type="text"
                name="tax" 
                class="form-control"
                @if (old('tax'))
                    value="{{ old('tax') }}"
                @else
                    value="0"
                @endif
            >
            @if ($errors->has('tax'))                                    
                <span class="has-error">
                    {{ $errors->first('tax') }}
                </span>
            @endif
        </div>  
    </div>
</div>
</div>