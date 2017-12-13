<div class="row">
	<div class="col-md-12">
		<div class="card card-block card-success">
		<div class="card-title-block">
		    <h3 class="title">Customer Transaction History</h3>
		</div>
		
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>Transaction ID</th>
					<th>Date</th>
					<th>Type</th>
					<th>Result</th>
					<th>Amount</th>
				</thead>
				<tbody>
					@foreach ($histories as $history)
					<tr>
						<td>{{ $history->id }}</td>
						<td>{{ $history->created_at }}</td>
						<td>{{ $history->payment_method }}</td>
						<td>
						@if ($history->status == 2)
							Failed
						@else
							Succeeded
						@endif
						</td>
						<td>{{ $history->amount }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{{ $histories->appends(request()->except('page'))->links() }}
		</div>
	</div>
</div>