<div class="card card-block card-success transaction_type">
	<div class="card-title-block">
	    <h3 class="title">{{ trans('app.select_transaction_type') }}</h3>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>
					<input type="radio" 
						name="transaction_type" 
						class="transaction_type_radio" 
						value="authorize-capture"
						checked>
					{{ trans('app.authorize_and_capture') }}
				</label>
			</div>
			<div class="form-group">
				<label>
					<input type="radio"
						name="transaction_type"
						class="transaction_type_radio"
						value="authorize">
					{{ trans('app.authorize_only') }}
				</label>
			</div>
			<div class="form-group">
				<label>
					<input type="radio"
						name="transaction_type"
						class="transaction_type_radio"
						value="capture">
					{{ trans('app.capture_only') }}
				</label>				
			</div>
		</div>
	</div>
</div>