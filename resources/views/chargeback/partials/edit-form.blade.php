    <div class="card card-block sameheight-item">                    
        {{ csrf_field() }}  
        <input name="_method" type="hidden" value="PATCH">
        <input name="chargeback_id" type="hidden" value="{{ $chargeback->id }}"> 
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('merchant_id') ? 'has-error' : ''}}">            
                <label class="control-label">{{ trans('app.merchants') }}</label>
                <select name="merchant_id" class="form-control underlined">
                    <option value="">Select Merchant</option>
                    @foreach ($merchantList as $merchant)
                        <option value="{{ $merchant->id }}"
                            @if (
                                old('merchant_id') == $merchant->id ||
                                $chargeback['merchant_id'] == $merchant->id
                            )
                                selected
                            @endif
                        >
                            {{ $merchant->firstname }} 
                            {{ $merchant->lastname }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('merchant_id'))                                    
                    <span class="has-error">
                        {{ $errors->first('merchant_id') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('amount') ? 'has-error' : ''}}">            
                <label class="control-label">{{ trans('app.amount') }}</label>
                <input type="text"
                    name="amount"
                    class="form-control underlined"
                    placeholder="Ex. 1000"
                    @if (old('amount'))
                        value="{{ old('amount') }}"
                    @elseif (isset($chargeback))
                        value="{{ $chargeback->amount }}" 
                    @endif
                >
                @if ($errors->has('amount'))                                    
                    <span class="has-error">
                        {{ $errors->first('amount') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">            
                <label class="control-label">{{ trans('app.firstname') }}</label>
                <input type="text"
                    name="firstname"
                    class="form-control underlined"
                    placeholder="Ex. John"
                    @if (old('firstname'))
                        value="{{ old('firstname') }}"
                    @elseif (isset($chargeback))
                        value="{{ $chargeback->firstname }}" 
                    @endif
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
                <label class="control-label">{{ trans('app.lastname') }}</label>
                <input type="text"
                    name="lastname"
                    class="form-control underlined"
                    placeholder="Ex. Doe"
                    @if (old('lastname'))
                        value="{{ old('lastname') }}"
                    @elseif (isset($chargeback))
                        value="{{ $chargeback->lastname }}" 
                    @endif
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
            <div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">            
                <label class="control-label">{{ trans('app.status') }}</label>
                <select name="status" class="form-control underlined">
                    <option value="">Select Status</option>
                        @foreach ($statusList as $key => $list)
                            <option value="{{ $key }}"
                                @if (
                                    $key == old('status') ||
                                    $key == $chargeback->status
                                )
                                    selected
                                @endif
                            >
                                {{ $list }}
                            </option>
                        @endforeach
                </select>
                @if ($errors->has('status'))                                    
                    <span class="has-error">
                        {{ $errors->first('status') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{$errors->has('dispute_result') ? 'has-error' : ''}}">            
                <label class="control-label">{{ trans('app.dispute_result') }}</label>
                <select name="dispute_result" class="form-control underlined">
                    <option value="">Select Result</option>
                        @foreach ($disputeResult as $result)
                            <option value="{{ $result }}"
                                @if (
                                    $result == old('dispute_result') ||
                                    $result == $chargeback->dispute_result
                                )
                                    selected
                                @endif
                            >
                                {{ ucfirst($result) }}
                            </option>
                        @endforeach
                </select>
                @if ($errors->has('dispute_result'))                                    
                    <span class="has-error">
                        {{ $errors->first('dispute_result') }}
                    </span>
                @endif
            </div>
        </div>
    </div>        
    </div>