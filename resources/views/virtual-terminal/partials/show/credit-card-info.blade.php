<div class="card card-block">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.credit_card_information') }}</h3>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.credit_card_number') }}
            </label>
            <p>******************</p>
        </div>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.credit_card_cvv') }}
            </label>
            <p>{{ $vt->credit_card_cvv }}</p>
        </div>      
        </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.credit_card_expiration_year') }}
            </label>
            <p>{{ $vt->credit_card_expiration_year }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.credit_card_expiration_month') }}
            </label>
            <p>{{ $vt->credit_card_expiration_month }}</p>
        </div>
    </div>
</div>
</div>