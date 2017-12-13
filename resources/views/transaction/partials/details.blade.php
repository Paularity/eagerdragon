<div class="row">
	<div class="col-md-6">
		<div class="card card-block card-success">
		<div class="card-title-block">
		    <h3 class="title">Transaction Details</h3>
		</div>
		
		<div class="col-md-12">
			<table class="table table-bordered">
				<tr>
					<th>Transaction ID</th>
					<td>{{ $transaction->id }}</td>
				</tr>
				<tr>
					<th>Transaction Type</th>
					<td>{{ $transaction->payment_method }}</td>
				</tr>
				<tr>
					<th>Transaction Result</th>
					<td>
						@if ($transaction->status == 2)
							Failed
						@else
							Succeeded
						@endif
					</td>
				</tr>
				<tr>
					<th>Amount</th>
					<td>{{ $transaction->amount }}</td>
				</tr>
				<tr>
					<th>Tax</th>
					<td>{{ $transaction->tax }}</td>
				</tr>
				<tr>
					<th>Currency</th>
					<td>{{ $transaction->currency }}</td>
				</tr>
				<tr>
					<th>Order ID</th>
					<td>{{ $transaction->order_id }}</td>
				</tr>
				<tr>
					<th>Order Description</th>
					<td>{{ $transaction->order_description }}</td>
				</tr>
				<tr>
					<th>Settled Date</th>
					<td>{{ $transaction->created_at }}</td>
				</tr>
			</table>
		</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card card-block card-success">
			<div class="card-title-block">
			    <h3 class="title">Refund Transaction</h3>
			</div>
			<form action="{{ url('transactions/refund') }}" method="POST">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">
							Transaction ID <span class="required">*</span>
						</label>
						<input type="text"
							name="id"
							class="form-control" 
							value="{{ $transaction->id }}" 
							readonly 
						>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">
							Amount <span class="required">*</span>
						</label>
						<input type="text" 
							name="amount" 
							class="form-control"
							value="{{ $transaction->amount }}" 
						>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">
							Tax <span class="required">*</span>
						</label>
						<input type="text" 
							name="tax" 
							class="form-control"
							value="{{ $transaction->tax }}" 
						>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">
							Currency <span class="required">*</span>
						</label>
						<input type="text" 
							name="currency" 
							class="form-control"
							value="{{ $transaction->currency }}" 
							readonly 
						>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-primary">
							Refund
						</button>
					</div>
				</div>
			</div>
			</form>
		</div>

		<div class="card card-block card-success">
		<div class="card-title-block">
		    <h3 class="title">Credit Card Details</h3>
		</div>

		<div class="col-md-12">
			<table class="table table-bordered">
				<tr>
					<th>Credit Card</th>
					<td>
						*******{{ $transaction->credit_card_number_last_four }}
					</td>
				</tr>
				<tr>
					<th>Credit Card Type</th>
					<td>
						{{ $transaction->cctype }}
					</td>
				</tr>
				<tr>
					<th>Expire</th>
					<td>
						{{ decrypt($transaction->credit_card_expiration_month) }}
						{{ decrypt($transaction->credit_card_expiration_year) }}
					</td>
				</tr>
			</table>
		</div>
		</div>

		<div class="card card-block card-success">
		<div class="card-title-block">
		    <h3 class="title">Customer Details</h3>
		</div>

		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<th>Billing Address</th>
					<th>Shipping Address</th>
				</thead>
				<tbody>
					<tr>
						<td>
							{{ $transaction->firstname }}
							{{ $transaction->lastname }}
							<br/>
							<br/>
							{{ $transaction->address1 }}
							<br/>
							{{ $transaction->email }}
						</td>
						<td>
							{{ $transaction->shipping_address1 }}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>