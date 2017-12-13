<form role="form" method="POST" action="{{ $submitUrl }}">
{{ csrf_field() }}
@if (isset($agent))
    <input name="_method" type="hidden" value="PATCH">
    <input name="agent_id" type="hidden" value="{{ $agent->id }}">
@endif        
@if(session()->has('message'))
    <div class="alert alert-success fade in alert-dismissable">
        {{ session()->get('message') }}
    </div>
@endif
    @include('agent.partials.agent_info')
    @include('agent.partials.csr_info')
    @include('agent.partials.commission_info')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <br/>
                <button type="submit" class="btn btn-block btn-primary">
                    Submit
                </button> 
            </div>
        </div>  
    </div>
</form>