@if(session()->has('success'))
    <div class="alert alert-success fade in alert-dismissable">
        {{ session()->get('success') }}
    </div>
@endif