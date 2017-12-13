<div class="card card-block sameheight-item">                    
    <div class="card-title-block">
        <h3 class="title">{{ trans('app.merchant_details') }}</h3>
    </div>

	<div class="form-group">
		<label class="control-label">{{ trans('app.name') }}</label>
		<p class="form-control-static underlined">
			{{ $customer->merchant['firstname'] }}
			{{ $customer->merchant['lastname'] }}
		</p>
	</div>

	<div class="form-group">
		<label class="control-label">{{ trans('app.email') }}</label>
		<p class="form-control-static underlined">
			{{ $customer->merchant['email'] }}
		</p>
	</div>

	<div class="form-group">
		<label class="control-label">{{ trans('app.mobile') }}</label>
		<p class="form-control-static underlined">
			{{ $customer->merchant['mobile_number'] }}
		</p>
	</div>
</div>