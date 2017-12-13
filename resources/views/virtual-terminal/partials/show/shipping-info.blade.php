<div class="card card-block sameheight-item">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.shipping_address') }}</h3>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.firstname') }}
            </label>
            <p>{{ $vt->shipping_firstname }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.lastname') }}
            </label>
            <p>{{ $vt->shipping_lastname }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.email') }}
            </label>
            <p>{{ $vt->shipping_email }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.mobile') }}
            </label>
            <p>{{ $vt->shipping_mobile }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.address') }}
            </label>
            <p>{{ $vt->shipping_address }}</p>
        </div>
    </div>
</div>
</div>