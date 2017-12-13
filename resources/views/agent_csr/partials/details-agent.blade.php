<div class="card card-block sameheight-item">                    
    <div class="card-title-block">
        <h3 class="title">{{ trans('app.agent_details') }}</h3>
    </div>

	<div class="form-group">
		<label class="control-label">{{ trans('app.name') }}</label>
		<p class="form-control-static underlined">
			{{ $csr->agentAccount->user['firstname'] }}
			{{ $csr->agentAccount->user['lastname'] }}
		</p>
	</div>

	<div class="form-group">
		<label class="control-label">{{ trans('app.email') }}</label>
		<p class="form-control-static underlined">
			{{ $csr->agentAccount->user['email'] }}
		</p>
	</div>

	<div class="form-group">
		<label class="control-label">{{ trans('app.mobile') }}</label>
		<p class="form-control-static underlined">
			{{ $csr->agentAccount->user['mobile_number'] }}
		</p>
	</div>
</div>