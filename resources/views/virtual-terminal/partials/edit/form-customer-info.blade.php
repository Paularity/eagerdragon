<div class="card card-block">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.customer') }}</h3>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('customer_id') ? 'has-error' : ''}}">
            <label class="control-label">
                {{ trans('app.customer_name') }} <span class="required">*</span>
            </label>
            <select name="customer_id" 
                class="form-control underlined">
                @foreach ($customerList as $customer)
                    <option value="{{ $customer->id }}"
                        @if ($customer->id == $vt->customer_id)
                            selected
                        @endif
                    >
                        {{ $customer->firstname }} 
                        {{ $customer->lastname }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('customer_id'))                                    
                <span class="has-error">
                    {{ $errors->first('customer_id') }}
                </span>
            @endif
        </div>
    </div>
    <!-- <div class="col-md-6">
        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
            <label class="control-label">
                {{ trans('app.amount') }} <span class="required">*</span>
            </label>
            <input type="text" 
                name="amount"
                class="form-control underlined"
                value="{{ 
                    $vt->amount ?:
                    old('amount')
                }}">
        </div>
    </div> -->
</div>

</div>