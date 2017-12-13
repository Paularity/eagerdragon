<div class="row sameheight-container">
    <div class="col-md-12">
        <div class="card card-block sameheight-item">

            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">
                        Name <span class="required">*</span>
                    </label>
                    <p>{{ $processor->name ?: '--' }} </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">
                        Short Name <span class="required">*</span>
                    </label>
                    <p>{{ $processor->short_name ?: '--' }} </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">
                        Email <span class="required">*</span>
                    </label>
                    <p>{{ $processor->email ?: '--' }} </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">
                        Wire Fee <span class="required">*</span>
                    </label>
                    <p>{{ $processor->wire_fee ?: '--' }} </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">
                        Timezone <span class="required">*</span>
                    </label>
                    <p>{{ isset($timezones[$processor->timezone])
                        ? $timezones[$processor->timezone]
                        : '--' }} </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">
                        Type <span class="required">*</span>
                    </label>
                    <p>{{ isset($processorTypes[$processor->type])
                        ? $processorTypes[$processor->type]
                        : '--' }} </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">
                        Is Integrated <span class="required">*</span>
                    </label>
                    <p>{{ $processor->is_integrated == 1
                        ? 'Yes'
                        : 'No' }} </p>
                </div>
            </div>
        </div>
    </div>
</div>