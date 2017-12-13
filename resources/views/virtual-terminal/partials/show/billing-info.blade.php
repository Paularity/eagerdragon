<div class="card card-block">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.billing_address') }}</h3>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.firstname') }}
            </label>
            <p>{{ $vt->billing_firstname }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.lastname') }}
            </label>
            <p>{{ $vt->billing_lastname }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.email') }}
            </label>
            <p>{{ $vt->billing_email }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.mobile') }}
            </label>
            <p>{{ $vt->billing_mobile }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.address') }}
            </label>
            <p>{{ $vt->billing_address }}</p>
        </div>        
    </div>
</div>
</div>