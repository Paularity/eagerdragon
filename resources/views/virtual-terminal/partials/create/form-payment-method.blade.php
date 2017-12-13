<div class="card card-block card-success">
	<div class="card-title-block">
	    <h3 class="title">{{ trans('app.select_payment_method') }}</h3>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>
					<input type="radio" 
						name="payment_method" 
						class="payment_method" 
						value="sale"
						checked>
					{{ trans('app.charge_a_credit_card') }}
				</label>
			</div>
			<div class="form-group">
				<label>
					<input type="radio"
						name="payment_method"
						class="payment_method" 
						value="refund">
					{{ trans('app.refund_a_credit_card') }}
				</label>
			</div>
		</div>
	</div>
</div>