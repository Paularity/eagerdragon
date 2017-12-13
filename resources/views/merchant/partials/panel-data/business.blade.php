<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">
                Name
            </label>
            <p>{{ $businessInfo->business_name ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">
                Legal Name
            </label>
            <p>{{ $businessInfo->business_legal_name ?: '--' }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">
                Type
            </label>
            <p>
                {{ $businessInfo->business_type }}
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Website
            </label>
            <p>
                {{ $businessInfo->business_website }}
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Start Date
            </label>
            <p>
                {{ $businessInfo->start_date }}
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Estimated Monthly Sales
            </label>
            <p>
                {{ $businessInfo->estimated_monthly_sales }}
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Industry
            </label>
            <p>
                {{ $businessInfo->industry }}
            </p>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">
                Description
            </label>
            <p>
                {{ $businessInfo->description }}
            </p>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label class="control-label">
                Address
            </label>
            <p>
                {{ $businessInfo->business_address }}
            </p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">
                City
            </label>
            <p>
                {{ $businessInfo->business_city }}
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                State
            </label>
            <p>
                {{ $businessInfo->business_state }}
            </p>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label">
                State
            </label>
            <p>
                {{ $businessInfo->business_zip }}
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">
                Country
            </label>
            <p>{{
                isset($countryList[$businessInfo->business_country])
                ? $countryList[$businessInfo->business_country]
                : '--'
                }}
            </p>
        </div>
    </div>
</div>