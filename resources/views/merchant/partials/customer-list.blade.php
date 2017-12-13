<div class="card card-block sameheight-item">                    
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label">Customer's List</label>
				@foreach ($user->customer as $customer)
					<p class="form-control-static underlined">
						{{ $customer['firstname'] }} {{ $customer['lastname'] }}
					</p>
				@endforeach
			</div>
		</div>
	</div>
</div>