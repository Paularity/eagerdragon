<div class="card card-block">
    <div class="card-title-block">
        <h3 class="title">Settings</h3>
    </div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Currency</label>
				<select name="currency" class="form-control">
				@foreach ($currencyList as $key => $currency)
					<option value="{{ $key }}"
						@if (old('currency') === $key)
                            selected
                        @elseif (isset($merchantProcessor)
                            && $merchantProcessor->pivot
                            && $merchantProcessor->pivot->currency === $key)
							selected
                        @else
                            @if ($key === 'USD')
                                selected
                            @endif
						@endif
					>
						{{ $currency }}
					</option>
				@endforeach
				</select>
			</div>
		</div>
        <div class="col-md-4">
            <div class="form-group {{$errors->has('mid') ? 'has-error' : ''}}">
                <label class="control-label">
                    MID
                </label>
                <input type="text"
                    name="mid"
                    class="form-control"
                    @if( isset($merchantProcessor) && $merchantProcessor->pivot)
                        value="{{ $merchantProcessor->pivot->mid }}"
                    @elseif ($merchantAccount->mid)
                        value="{{ $merchantAccount->mid }}"
                    @else
                        value="{{old('mid')}}"
                    @endif
                    required
                >
                @if ($errors->has('routing'))
                    <span class="has-error">
                        {{ $errors->first('mid') }}
                    </span>
                @endif
            </div>
        </div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('is_for_moto') ? 'has-error' : ''}}">
                <label class="control-label">
                    <input type="checkbox"
                	name="is_for_moto"
                	value="1"
                    {{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        && $merchantProcessor->pivot->is_for_moto == 1
                        ? 'checked'
                        : ''
                    }}
                	class="checkbox">
                	<span>MID is for MOTO</span>
                </label>
                @if ($errors->has('is_for_moto'))
                    <span class="has-error">
                        {{ $errors->first('is_for_moto') }}
                    </span>
                @endif
            </div>
		</div>
	</div>

	<hr class="dotted">

	<div class="row">
		<div class="col-md-4">
			<div class="form-group {{$errors->has('routing') ? 'has-error' : ''}}">
                <label class="control-label">
                    Routing
                </label>
                <input type="text"
                	name="routing"
                	class="form-control"
                	value="{{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        ? $merchantProcessor->pivot->routing
                        : old('routing')
                    }}"
                	required
                >
                @if ($errors->has('routing'))
                    <span class="has-error">
                        {{ $errors->first('routing') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('rebill_routing') ? 'has-error' : ''}}">
                <label class="control-label">
                    Rebill Routing
                </label>
                <input type="text"
                	name="rebill_routing"
                	class="form-control"
                	value="{{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        ? $merchantProcessor->pivot->rebill_routing
                        : old('rebill_routing')
                    }}"
                	required
                >
                @if ($errors->has('rebill_routing'))
                    <span class="has-error">
                        {{ $errors->first('rebill_routing') }}
                    </span>
                @endif
            </div>
		</div>
	</div>

	<hr class="dotted">

	<div class="row">
		<div class="col-md-4">
			<div class="form-group {{$errors->has('start_date') ? 'has-error' : ''}}">
                <label class="control-label">
                    Start Date
                </label>
                <input type='text'
                    name="start_date"
                    value="{{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        ? $merchantProcessor->pivot->start_date
                        : old('start_date')
                    }}"
                    class="form-control datepicker"
                    data-date-format="mm/dd/yyyy"
                >
                @if ($errors->has('start_date'))
                    <span class="has-error">
                        {{ $errors->first('start_date') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('notes') ? 'has-error' : ''}}">
                <label class="control-label">
                    Notes
                </label>
                <textarea name="notes"
                	class="form-control"
                	value="{{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        ? $merchantProcessor->pivot->notes
                        : old('notes')
                    }}"
                    @if (old('notes'))
                        >{{ old('notes') }}</textarea>

                    @elseif (isset($merchantProcessor) && $merchantProcessor->pivot)
                        >{{ $merchantProcessor->pivot->notes }}</textarea>
                    @else
                        ></textarea>
                    @endif
                @if ($errors->has('notes'))
                    <span class="has-error">
                        {{ $errors->first('notes') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('descriptor') ? 'has-error' : ''}}">
                <label class="control-label">
                    Descriptor
                </label>
                <textarea name="descriptor"
                	class="form-control"
                	@if (old('descriptor'))
                        >{{ old('descriptor') }}</textarea>

                    @elseif (isset($merchantProcessor) && $merchantProcessor->pivot)
                        >{{ $merchantProcessor->pivot->descriptor }}</textarea>
                    @else
                        ></textarea>
                    @endif
                @if ($errors->has('descriptor'))
                    <span class="has-error">
                        {{ $errors->first('descriptor') }}
                    </span>
                @endif
            </div>
		</div>
	</div>

	<hr class="dotted">

	<div class="row">
		<div class="col-md-4">
			<div class="form-group {{$errors->has('is_active') ? 'has-error' : ''}}">
                <label class="control-label">
                    <input type="checkbox"
                    	name="is_active"
                    	class="checkbox"
                    	value="1"
                    	{{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        && $merchantProcessor->pivot->is_active == 1
                        ? 'checked'
                        : ''
                    }}>
                    <span>Active</span>
                </label>
                @if ($errors->has('is_active'))
                    <span class="has-error">
                        {{ $errors->first('is_active') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('download_from_platform') ? 'has-error' : ''}}">
                <label class="control-label">
                    <input type="checkbox"
                    	name="download_from_platform"
                    	class="checkbox"
                        {{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        && $merchantProcessor->pivot->download_from_platform == 'on'
                        ? 'checked'
                        : ''
                    }}>
                    <span>Download from Platform</span>
                </label>
                @if ($errors->has('download_from_platform'))
                    <span class="has-error">
                        {{ $errors->first('download_from_platform') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('validate_transaction_data') ? 'has-error' : ''}}">
                <label class="control-label">
                    <input type="checkbox"
                    	name="validate_transaction_data"
                    	class="checkbox"
                        {{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        && $merchantProcessor->pivot->validate_transaction_data == 'on'
                        ? 'checked'
                        : ''
                    }}>
                    <span>Validate Transaction Data</span>
                </label>
                @if ($errors->has('validate_transaction_data'))
                    <span class="has-error">
                        {{ $errors->first('validate_transaction_data') }}
                    </span>
                @endif
            </div>
		</div>
	</div>

	<hr class="dotted">

	<div class="row">
		<div class="col-md-12">
			<div class="form-group {{$errors->has('api_url_production') ? 'has-error' : ''}}">
                <label class="control-label">
                    API URL - Production <span class="required">*</span>
                </label>
                <input type="text"
                	name="api_url_production"
                	class="form-control"
                	value="{{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        ? $merchantProcessor->pivot->api_url_production
                        : old('api_url_production')
                    }}"
                	required
                >
                @if ($errors->has('api_url_production'))
                    <span class="has-error">
                        {{ $errors->first('api_url_production') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-12">
			<div class="form-group {{$errors->has('api_url_testing') ? 'has-error' : ''}}">
                <label class="control-label">
                    API URL - Testing <span class="required">*</span>
                </label>
                <input type="text"
                	name="api_url_testing"
                	class="form-control"
                	value="{{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        ? $merchantProcessor->pivot->api_url_testing
                        : old('api_url_testing')
                    }}"
                	required
                >
                @if ($errors->has('api_url_testing'))
                    <span class="has-error">
                        {{ $errors->first('api_url_testing') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-12">
			<div class="form-group {{$errors->has('api_key') ? 'has-error' : ''}}">
                <label class="control-label">
                    API KEY <span class="required">*</span>
                </label>
                <input type="text"
                	name="api_key"
                	class="form-control"
                    @if(isset($merchantProcessor)
                        && $merchantProcessor->pivot))
                        value="{{ $merchantProcessor->pivot->api_key }}"
                    @elseif (old('api_key'))
                        value="{{ old('api_key') }}"
                    @elseif (isset($apiKey))
                        value="{{ $apiKey }}"
                    @endif
                >
                @if ($errors->has('api_key'))
                    <span class="has-error">
                        {{ $errors->first('api_key') }}
                    </span>
                @endif
            </div>
		</div>

        <div class="col-md-12">
            <div class="form-group {{$errors->has('api_secret') ? 'has-error' : ''}}">
                <label class="control-label">
                    API SECRET <span class="required">*</span>
                </label>
                <input type="text"
                    name="api_secret"
                    class="form-control"
                    @if(isset($merchantProcessor) 
                        && $merchantProcessor->pivot))
                        value="{{ $merchantProcessor->pivot->api_secret }}"
                    @endif
                >
                @if ($errors->has('api_secret'))
                    <span class="has-error">
                        {{ $errors->first('api_secret') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group {{$errors->has('api_token') ? 'has-error' : ''}}">
                <label class="control-label">
                    API TOKEN <span class="required">*</span>
                </label>
                <input type="text"
                    name="api_token"
                    class="form-control"
                    @if(isset($merchantProcessor)
                        && $merchantProcessor->pivot))
                        value="{{ $merchantProcessor->pivot->api_token }}"
                    @elseif (old('api_token'))
                        value="{{ old('api_token') }}"
                    @elseif (isset($apiKey))
                        value="{{ $apiKey }}"
                    @endif
                >
                @if ($errors->has('api_token'))
                    <span class="has-error">
                        {{ $errors->first('api_token') }}
                    </span>
                @endif
            </div>
        </div>
	</div>
</div>