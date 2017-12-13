<div class="card card-block sameheight-item">                    
 	<div class="row">
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">{{ trans('app.name') }}</label>
				<p class="form-control-static underlined">
					{{ $customer->firstname }} {{ $customer->lastname }}
				</p>
			</div>
    	</div>  
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">{{ trans('app.email') }}</label>
				<p class="form-control-static underlined">
					{{ $customer->email }}
				</p>
			</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">{{ trans('app.phone') }}</label>
				<p class="form-control-static underlined">
					{{ $customer->phone }}
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">{{ trans('app.country') }}</label>
				<p class="form-control-static underlined">
					@foreach ($countryList as $key => $country)
						@if ($key == $customer->country)
							{{ $country }}
						@endif
					@endforeach
				</p>
			</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<div class="form-group">
    			<label class="control-label">Address</label>
    			<p class="form-control-static underlined">
    				{{ $customer->address1 }}
    			</p>
    		</div>
    	</div>
    	<div class="col-md-6">
    		<div class="form-group">
    			<label class="control-label">Address (cont.)</label>
    			<p class="form-control-static underlined">
    				{{ $customer->address2 }}
    			</p>
    		</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<div class="form-group">
    			<label class="control-label">State</label>
    			<p class="form-control-static underlined">
    			@foreach ($statesList as $key => $state)
    				@if ($customer->us_state == $key)
    					{{ $state }}
    				@endif
    			@endforeach
    			</p>
    		</div>
    	</div>
    	<div class="col-md-6">
    		<div class="form-group">
    			<label class="control-label">City</label>
    			<p class="form-control-static underlined">
    				{{ $customer->city }}
    			</p>
    		</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<div class="form-group">
    			<label class="control-label">ZIP/Postal Code</label>
    			<p class="form-control-static underlined">
    				{{ $customer->zippostal_code }}
    			</p>
    		</div>
    	</div>
    	<div class="col-md-6">
    		<div class="form-group">
    			<label class="control-label">Timezone</label>
    			<p class="form-control-static underlined">
    				{{ $customer->timezone }}
    			</p>
    		</div>
    	</div>
    </div>
</div>