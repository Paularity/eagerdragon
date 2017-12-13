<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Firstname</label>
		<p class="form-control-static underlined">
			{{ $user->firstname }}
		</p>
	</div>
</div>  
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Lastname</label>
		<p class="form-control-static underlined">
			{{ $user->lastname }}
		</p>
	</div>
</div> 	
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Email</label>
		<p class="form-control-static underlined">
			{{ $user->email }}
		</p>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Username</label>
		<p class="form-control-static underlined">
			{{ $user->username }}
		</p>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Mobile Number</label>
		<p class="form-control-static underlined">
			{{ $user->mobile_number }}
		</p>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Status</label>
		<p class="form-control-static underlined">
			{{ $user->status }}
		</p>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
    	<div class="card-title-block">
	        <h3 class="title">Commission Payment Information</h3>
	    </div>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Account Number</label>
		<p class="form-control-static underlined">
			{{ $user->agentAccount->account_number ?: '--' }}
		</p>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Legal Name (Name on Tax Return)</label>
		<p class="form-control-static underlined">
			{{ $user->agentAccount->legal_name ?: '--' }}
		</p>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Tax ID (EIN or SSN)</label>
		<p class="form-control-static underlined">
			{{ $user->agentAccount->tax_id ?: '--' }}
		</p>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Business Type</label>
		<p class="form-control-static underlined">
			{{ $user->agentAccount->business_type ?: '--' }}
		</p>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">ABA\Swift Routing Number</label>
		<p class="form-control-static underlined">
			{{ $user->agentAccount->swift_routing_number ?: '--' }}
		</p>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Date Created</label>
		<p class="form-control-static underlined">
			{{ $user->created_at->toDayDateTimeString() }}
		</p>
	</div>
</div>
