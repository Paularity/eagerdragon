@component('mail::message')
<div class="receipt-wrapper">
	<h1 class="receipt-title">TRANSACTION RECEIPT</h1>
	<h3 class="receipt-merchant-name">
		{{ $transaction->merchant['firstname'] }}
		{{ $transaction->merchant['lastname'] }}
	</h3>
	<h5 class="receipt-merchant-email">
		{{ $transaction->merchant['email'] }}
	</h5>
	<p class="receipt-heading-text">
		You have successfully completed your transaction. 
		Order #{{ $transaction->order_id }}, on 
		{{ date('F j, Y', strtotime($transaction->created_at)) }}
	</p>

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
</div>

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
@endcomponent
