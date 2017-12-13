<div class="card card-block">
    <div class="card-title-block">
        <h3 class="title">Transaction Permissions</h3>
    </div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
                <label class="control-label">
                    Transaction Type <span class="required">*</span>
                </label>
                <select name="transaction_type" class="form-control">
                @foreach ($transactionTypes as $transaction)
                    <option value="{{ $transaction }}"
                        @if (old('transaction_type') === $transaction)
                            selected
                        @elseif (isset($merchantProcessor)
                            && $merchantProcessor->pivot
                            && $merchantProcessor->pivot->transaction_type === $transaction)
                            selected
                        @endif
                    >
                        {{ ucfirst($transaction) }}
                    </option>
                @endforeach
                </select>
                @if ($errors->has('transaction_type'))
                    <span class="has-error">
                        {{ $errors->first('transaction_type') }}
                    </span>
                @endif
            </div>

            <hr class="dotted">

            <div class="form-group">
                <label class="control-label">
                    <input type="checkbox"
                    name="acquire_type"
                    value="1"
                    {{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        && $merchantProcessor->pivot->acquire_type == 1
                        ? 'checked'
                        : ''
                    }}
                    class="checkbox">
                    <span>Automated Capture</span>
                </label>
                @if ($errors->has('acquire_type'))
                    <span class="has-error">
                        {{ $errors->first('acquire_type') }}
                    </span>
                @endif
            </div>

            <hr class="dotted">

            <div class="form-group">
                <label class="control-label">
                    Payment Method <span class="required">*</span>
                </label>
                <select name="payment_method" class="form-control">
                @foreach ($paymentMethods as $method)
                    <option value="{{ $method }}"
                        @if (old('payment_method') === $method)
                            selected
                        @elseif (isset($merchantProcessor)
                            && $merchantProcessor->pivot
                            && $merchantProcessor->pivot->payment_method === $method)
                            selected
                        @endif
                    >
                        {{ ucfirst($method) }}
                    </option>
                @endforeach
                </select>
                @if ($errors->has('payment_method'))
                    <span class="has-error">
                        {{ $errors->first('payment_method') }}
                    </span>
                @endif
            </div>
		</div>
	</div>
</div>