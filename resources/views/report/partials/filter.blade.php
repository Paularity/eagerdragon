<div class="card card-block sameheight-item">
    <div class="form-group">
        <h3 class="title"> Filters </h3>
    </div>
    <div class="row">
        @if ($errors->any())
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <form method="POST" action="{{ url('reports') }}">
            {{ csrf_field() }}
    		<div class="col-md-3">
                <div id="start_date" class="form-group {{$errors->has('period_start_date') ? 'has-error' : ''}}">

                    <label>
                        Period Start Date <span class="required">*</span>
                    </label>
                    <div class="input-group date">
                        <input type="text"  class="form-control datepicker"
                            @if ( isset($oldInputs)
                                && isset($oldInputs['period_start_date']))
                                value="{{ $oldInputs['period_start_date'] }}"
                           @else
                                value="{{ old('period_start_date') }}"
                            @endif
                            required
                        name="period_start_date">
                    </div>
                </div>
    		</div>
    		<div class="col-md-3">
                <div id="end_date" class="form-group {{$errors->has('period_end_date') ? 'has-error' : ''}}">
                    <label>
                        Period End Date <span class="required">*</span>
                    </label>
                    <div class="input-group date">
                        <input type="text"  class="form-control datepicker"
                            @if ( isset($oldInputs)
                                && isset($oldInputs['period_end_date']))
                               value="{{ $oldInputs['period_end_date'] }}"
                            @else
                                value="{{ old('period_start_date') }}"
                            @endif
                            required
                        name="period_end_date">
                    </div>
                </div>
    		</div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        Processor
                    </label>
                    <select name="processor_id" class="form-control">
                        <option value="">All</option>
                        @foreach ($processors as $processor)
                            <option value="{{ $processor->id }}"
                                @if (old('processor_id') == $processor->id)
                                    selected
                                @elseif ( isset($oldInputs)
                                     && isset($oldInputs['processor_id'])
                                     && $oldInputs['processor_id'] == $processor->id )
                                    selected
                                @endif
                            >
                                {{ $processor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        Card Types
                    </label>
                    <select name="credit_card_type" class="form-control">
                        <option value="">All</option>
                        @foreach ($cardTypes as $card)
                            <option value="{{ $card }}"
                                @if (old('credit_card_type') == $card)
                                    selected
                                @elseif ( isset($oldInputs)
                                     && isset($oldInputs['credit_card_type'])
                                     && $oldInputs['credit_card_type'] == $card )
                                    selected
                                @endif
                            >
                                {{ ucfirst($card) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        Currencies
                    </label>
                    <select name="currency" class="form-control">
                        <option value="">All</option>
                        @foreach ($currencyList as $key => $currency)
                            <option value="{{ $key }}"
                                @if (old('currency') == $key)
                                    selected
                                @elseif ( isset($oldInputs)
                                     && isset($oldInputs['currency'])
                                     && $oldInputs['currency'] == $key )
                                    selected
                                @elseif (! isset($oldInputs) && $key == 'USD')
                                    selected
                                @endif
                            >
                                {{ $currency }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        Transaction Types
                    </label>
                    <select name="transaction_type" class="form-control">
                        <option value="">All</option>
                        @foreach ($transactionTypes as $key => $type)
                            <option value="{{ $key }}"
                                @if (old('transaction_type') == $key)
                                    selected
                                @elseif ( isset($oldInputs)
                                     && isset($oldInputs['transaction_type'])
                                     && $oldInputs['transaction_type'] == $key )
                                    selected
                                @endif
                            >
                                {{ ucfirst($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        Recurring
                    </label>
                    <select name="recurring" class="form-control">
                        <option value="">All</option>
                        @foreach ($recurrings as $key => $recurring)
                            <option value="{{ $key }}"
                                @if (old('recurring') == $key)
                                    selected
                                @elseif ( isset($oldInputs)
                                     && isset($oldInputs['recurring'])
                                     && $oldInputs['recurring'] == $key )
                                    selected
                                @endif
                            >
                                {{ $recurring }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        Agents
                    </label>
                    <select name="agent" class="form-control">
                        <option value="">All</option>
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}"
                                @if (old('agent') == $agent->id)
                                    selected
                                @elseif ( isset($oldInputs)
                                     && isset($oldInputs['agent'])
                                     && $oldInputs['agent'] == $agent->id )
                                    selected
                                @endif
                            >
                                {{ $agent->agentAccount
                                    ? $agent->agentAccount->business_name
                                    : ''
                                }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
    		<div class="col-md-3">
    	        <div class="form-group">
                    <label class="control-label">
                    	Merchant
                    </label>
                    <select name="merchant" class="form-control">
                    	<option value="">All</option>
                    	@foreach ($merchants as $merchant)
                            <option value="{{ $merchant->id }}"
                                @if (old('merchant') == $merchant->id)
                                    selected
                                @elseif ( isset($oldInputs)
                                     && isset($oldInputs['merchant'])
                                     && $oldInputs['merchant'] == $merchant->id )
                                    selected
                                @endif
                            >
                    			{{ $merchant->businessInformation
                                    ? $merchant->businessInformation->business_name
                                    : ''
                                }}
                    		</option>
                    	@endforeach
                    </select>
    	        </div>
    		</div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        MID
                    </label>
                    <select name="mid" class="form-control">
                        <option value="">All</option>
                        @foreach ($mids as $mid)
                            <option value="{{ $mid }}"
                                @if (old('mid') == $mid)
                                    selected
                                @elseif ( isset($oldInputs)
                                     && isset($oldInputs['mid'])
                                     && $oldInputs['mid'] == $mid )
                                    selected
                                @endif
                            >
                                {{ $mid }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        BIN
                    </label>
                    <select name="bin" class="form-control">
                        <option value="">All</option>
                        @foreach ($bins as $key => $bin)
                            <option value="{{ $bin }}"
                                @if (old('bin') == $bin)
                                    selected
                                @eseif ( isset($oldInputs)
                                     && isset($oldInputs['bin'])
                                     && $oldInputs['bin'] == $bin )
                                    selected
                                @endif
                            >
                                {{ $bin }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                    </label>
                    <button type="submit" class="btn btn-block btn-primary">
                        {{ trans('app.submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>