@if(session()->has('message'))
    <div class="alert alert-info fade in alert-dismissable">
        {{ session()->get('message') }}
    </div>
@endif