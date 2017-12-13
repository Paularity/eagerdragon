<div class="card card-block sameheight-item">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('merchant_id') ? 'has-error' : ''}}">            
                <label class="control-label">
                    {{ trans('app.merchants') }} <span class="required">*</span>
                </label>
                <select required 
                    name="merchant_id" 
                    class="form-control underlined">
                    <option value="">Select Merchant</option>
                    @foreach ($merchantList as $merchant)
                        <option value="{{ $merchant->id }}">
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
                <label class="control-label">
                    {{ trans('app.amount') }} <span class="required">*</span>
                </label>
                <input type="text"
                    name="amount"
                    class="form-control underlined"
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
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">            
                <label class="control-label">
                    {{ trans('app.firstname') }} <span class="required">*</span>
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
        <div class="col-md-6">
            <div class="form-group {{$errors->has('lastname') ? 'has-error' : ''}}">            
                <label class="control-label">
                    {{ trans('app.lastname') }} <span class="required">*</span>
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
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">            
                <label class="control-label">
                    {{ trans('app.status') }} <span class="required">*</span>
                </label>
                <select required 
                    name="status" 
                    class="form-control underlined">
                    <option value="">Select Status</option>
                        @foreach ($statusList as $k => $list)
                            <option value="{{ $k }}">{{ $list }}</option>
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
                <label class="control-label">
                    {{ trans('app.dispute_result') }} <span class="required">*</span>
                </label>
                <select required 
                    name="dispute_result" 
                    class="form-control underlined">
                    <option value="">Select Result</option>
                        @foreach ($disputeResult as $result)
                            <option value="{{ $result }}">{{ ucfirst($result) }}</option>
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
    <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <br/>
                <button type="submit" class="btn btn-block btn-primary">
                    {{ trans('app.submit') }}
                </button> 
            </div>
        </div>
    </div>
</div>