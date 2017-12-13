<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                MID
            </label>
            <p>{{ $account->mid ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Firstname
            </label>
            <p>{{ $merchant->firstname ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Lastname
            </label>
            <p>{{ $merchant->lastname ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Email
            </label>
            <p>{{ $merchant->email ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Username
            </label>
            <p>{{ $merchant->username ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Mobile Number
            </label>
            <p>{{ $merchant->mobile_number ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-6">
         <div class="form-group">
            <label class="control-label">
                Address
            </label>
            <p>{{ $account->address ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                City
            </label>
            <p>{{ $account->city ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                State
            </label>
            <p>{{ $account->state ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Zip
            </label>
            <p>{{ $account->zip ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Country
            </label>
            <p>{{
                isset($countryList[$account->country])
                ? $countryList[$account->country]
                : '--'
                }}
            </p>
        </div>
    </div>
</div>