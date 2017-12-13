<div class="card card-block">
<div class="card-title-block">
    <h3 class="title">{{ trans('app.customer') }}</h3>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.customer_name') }}
            </label>
            <p>
                @foreach ($customerList as $customer)
                    @if ($customer->id == $vt->customer_id)
                        {{ $customer->firstname }} 
                        {{ $customer->lastname }}
                    @endif
                @endforeach
            </p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">
                {{ trans('app.amount') }}
            </label>
            <p>
                {{ $vt->transaction['amount'] }}
            </p>
        </div>
    </div>
</div>

</div>