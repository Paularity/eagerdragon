    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Account Name
                </label>
                <p>{{ $bankInfo->account_name ?: '--' }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Account Number
                </label>
                <p>{{ $bankInfo->account_number ?: '--' }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Routing Number
                </label>
                <p>{{ $bankInfo->routing_number ?: '--' }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Tax ID
                </label>
                <p>{{ $bankInfo->tax_id ?: '--' }}</p>
            </div>
        </div>
    </div>
