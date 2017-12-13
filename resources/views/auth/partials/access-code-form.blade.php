<p class="text-xs-center">Access code was sent to your mobile phone/email.</p>
<form id="login-form" 
	method="POST" 
		action="{{ url('/access-code/verify') }}"
	>
		{{ csrf_field() }} 
    @if (count($errors) > 0)
		<div class="alert alert-danger role="alert">
			Invalid Access Code!
		</div>
	@endif
	@if(session()->has('message'))
	    <div class="alert alert-success role="alert">
			{{ session()->get('message') }}					        
	    </div>
	@endif
    <div class="form-group"> 
        <input id="access-code" 
			type="text" 
			class="form-control" 
			placeholder="Type your Access Code" 
			name="access_code"
            required
        > 
    </div>                        
    <div class="form-group"> 
        <a href="{{ url('/access-code/resend') }}" 
            class="forgot-btn pull-right">
            Resend Access Code?
        </a> 
        <br/>
    </div>
    <div class="form-group"> 
        <button type="submit" class="btn btn-block btn-primary">
            Submit
        </button> 
    </div>                            
</form>