@component('mail::message')
<style>
	.blue-line {
		border-bottom: 2px solid #6289b0;
	}
	.blue-text {
		color: #6289b0;
	}
	
	table {
	  border-spacing: 0;
	  border-collapse: collapse;
	}

	.table {
	  width: 100%;
	  max-width: 100%;
	  margin-bottom: 20px;
	  table-layout: fixed;
	}
	.table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td {
	  padding: 8px;
	  line-height: 1.42857143;
	  vertical-align: top;
	  border-top: 1px solid #ddd;
	}
	.table > thead > tr > th {
	  vertical-align: bottom;
	  border-bottom: 2px solid #ddd;
	}
	.table > caption + thead > tr:first-child > th,
	.table > colgroup + thead > tr:first-child > th,
	.table > thead:first-child > tr:first-child > th,
	.table > caption + thead > tr:first-child > td,
	.table > colgroup + thead > tr:first-child > td,
	.table > thead:first-child > tr:first-child > td {
	  border-top: 0;
	}
	.table > tbody + tbody {
	  border-top: 2px solid #ddd;
	}
	.table .table {
	  background-color: #fff;
	}
	.table-bordered {
	  border: 1px solid #ddd;
	}
	.table-bordered > thead > tr > th,
	.table-bordered > tbody > tr > th,
	.table-bordered > tfoot > tr > th,
	.table-bordered > thead > tr > td,
	.table-bordered > tbody > tr > td,
	.table-bordered > tfoot > tr > td {
	  border: 1px solid #ddd;
	}
	.table-bordered > thead > tr > th,
	.table-bordered > thead > tr > td {
	  border-bottom-width: 2px;
	}

	.page-break {
		page-break-after : always
	}
</style>

<hr class="blue-line">
<h2>Transaction Details</h2>
<table class="table">
	<tr>
		<td>Transaction ID</td>
		<td>{{ $transaction->id }}</td>
	</tr>
	<tr>
		<td>Transaction Type</td>
		<td>{{ $transaction->payment_method }}</td>
	</tr>
	<tr>
		<td>Amount</td>
		<td>{{ $transaction->amount }}</td>
	</tr>
	<tr>
		<td>Tax</td>
		<td>{{ $transaction->tax }}</td>
	</tr>
	<tr>
		<td>Currency</td>
		<td>{{ $transaction->currency }}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
			@if ($transaction->status == 2)
				Failed
			@else
				Success
			@endif
		</td>
	</tr>
	<tr>
		<td>Authorization Code</td>
		<td>{{ $transaction->authorization_code }}</td>
	</tr>
	<tr>
		<td>Order ID</td>
		<td>{{ $transaction->order_id }}</td>
	</tr>
	<tr>
		<td>Order Description</td>
		<td>{{ $transaction->order_description }}</td>
	</tr>
	<tr>
		<td>Transaction Date</td>
		<td>{{ $transaction->created_at }}</td>
	</tr>
	<tr>
		<td>Authorization Code</td>
		<td>{{ $transaction->authorization_code }}</td>
	</tr>
</table>

<hr class="blue-line">
<h2>Credit Card Details</h2>
<table class="table">
	<tr>
		<td>Credit Card Number</td>
		<td style="word-wrap: break-word">
			{{ $transaction->credit_card_number }}
		</td>
	</tr>
	<tr>
		<td>Credit Card Type</td>
		<td>
			{{ $transaction->credit_card_type }}
		</td>
	</tr>
	<tr>
		<td>Credit Card Expire Month</td>
		<td style="word-wrap: break-word">
			{{ $transaction->credit_card_expiration_month }}
		</td>
	</tr>
	<tr>
		<td>Credit Card Expire Year</td>
		<td style="word-wrap: break-word">
			{{ $transaction->credit_card_expiration_year }}
		</td>
	</tr>
</table>

<hr class="blue-line">
<h2>Customer Details</h2>
<table class="table">
	<tr>
		<td>
			<strong>Billing Address</strong>
		</td>
		<td>
			<strong>Shipping Address</strong>
		</td>
	</tr>
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
</table>

<hr class="blue-line">
<h2>Chargeback Data</h2>
<table class="table">
	<tr>
		<td>Reference Number</td>
		<td>{{ $chargeback->reference_number }}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
			@if ($chargeback->status == 2)
				Failed
			@else
				Success
			@endif
		</td>
	</tr>
	<tr>
		<td>Dispute Result</td>
		<td>{{ $chargeback->dispute_result }}</td>
	</tr>
	<tr>
		<td>Reason Code</td>
		<td>{{ $chargeback->reason_code }}</td>
	</tr>
	<tr>
		<td>Response Date</td>
		<td>{{ $chargeback->response_date }}</td>
	</tr>
	<tr>
		<td>Update Date</td>
		<td>{{ $chargeback->update_date }}</td>
	</tr>
</table>
@endcomponent