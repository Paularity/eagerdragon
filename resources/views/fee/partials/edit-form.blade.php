<div class="row sameheight-container">
    <div class="col-md-12">
        <form role="form" method="POST"
            action="{{ url(sprintf('merchant-accounts/%s/processors/%s/fees/',
            $merchantAccount->id,
            $processorId)) }}">
            {{ csrf_field() }}

            <input name="_method" type="hidden" value="PATCH">

            @if(session()->has('success'))
                <div class="alert alert-success fade in alert-dismissable">
                    {{ session()->get('success') }}
                </div>
            @endif

            @include('fee.partials.edit-select-processor')

            @if ($processorId)
                @include('fee.partials.edit-billing-schedule')
                @include('fee.partials.edit-anti-fraud')
                @include('fee.partials.edit-gateway')
                @include('fee.partials.bank')
                <div class="form-group">
                    <br/>
                    <button type="submit" class="btn btn-block btn-primary">
                        Submit
                    </button>
                </div>
            @endif
        </form>
    </div>
</div>