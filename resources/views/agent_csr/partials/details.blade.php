<div class="card card-block sameheight-item">                    
    <form> 
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">{{ trans('app.firstname') }}</label>
				<p class="form-control-static underlined">
					{{ $csr->firstname }}
				</p>
			</div>
    	</div>  
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">{{ trans('app.lastname') }}</label>
				<p class="form-control-static underlined">
					{{ $csr->lastname }}
				</p>
			</div>
    	</div> 	
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">{{ trans('app.email') }}</label>
				<p class="form-control-static underlined">
					{{ $csr->email }}
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">{{ trans('app.address') }}</label>
				<p class="form-control-static underlined">
					{{ $csr->address }}
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">{{ trans('app.mobile') }}</label>
				<p class="form-control-static underlined">
					{{ $csr->mobile }}
				</p>
			</div>
    	</div>
    </form>
</div>