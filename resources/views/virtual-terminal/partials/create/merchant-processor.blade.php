<div class="row">
	<div class="col-md-6">
		<div class="card card-block card-success">
			<div class="card-title-block">
			    <h3 class="title">Merchant</h3>
			</div>

			<div class="form-group">
				<select name="merchant_id" class="form-control vt-merchant">
					<option hidden>Select Merchant</option>
					@foreach ($merchantList as $merchant)
						<option value="{{ $merchant->id }}">
							{{ $merchant->firstname }}
							{{ $merchant->lastname }}
						</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card card-block card-success">
			<div class="card-title-block">
			    <h3 class="title">Processor</h3>
			</div>

			<div class="form-group">
				<label class="vt-processor-none">-- First Select a Merchant --</label>
				<select name="processor_id" class="form-control vt-processor hidden">
				</select>
			</div>
		</div>
	</div>
</div>