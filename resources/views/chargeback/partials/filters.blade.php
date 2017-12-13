<div class="row">
    <div class="col-sm-6">
        <div class="card card-block card-success">
        <div class="card-title-block">
            <h3 class="title">Date Range</h3>
        </div>    
            <div class="form-group">
                <div id="start_date" class="form-group">
                    <label>Period Start Date</label>
                    <div class="input-group date">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" 
                            class="form-control datepicker" 
                            name="period_start_date"
                        >
                    </div>
                </div>
                <div id="end_date" class="form-group">
                    <label>Period End Date</label>
                    <div class="input-group date">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" 
                            class="form-control datepicker" 
                            name="period_end_date"
                        >
                    </div>
                </div>            
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card card-block card-success">
        <div class="card-title-block">
            <h3 class="title">Amount Range</h3>
        </div>
            <div class="form-group">
                <label>Minimum</label> 
                <input type="text" 
                    class="form-control" 
                    name="min_amount_range">
            </div>
            <div class="form-group">
                <label>Maximum</label> 
                <input type="text" 
                class="form-control" 
                name="max_amount_range">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    <div class="card card-block card-success">
    <div class="card-title-block">
        <h3 class="title">Filters</h3>
    </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Transaction ID </label> 
                <input type="text" class="form-control" name="transaction_id" id="transaction_id">
            </div>
            <div class="form-group">
                <label>Dispute Result </label> 
                <select name="dispute_result" class="form-control">
                    <option hidden>Select Dispute Result</option>
                    @foreach ($disputeResult as $result)
                        <option value="{{ $result }}"
                            @if (old('dispute_result') == $result)
                                selected
                            @endif 
                        >
                            {{ ucfirst($result) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Status </label>
                <select name="status" class="form-control">
                    <option hidden>Select Status</option>
                    @foreach ($statusList as $key => $status)
                        <option value="{{ $key }}"
                            @if (old('status') === $key)
                                selected
                            @endif 
                        >
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>                  
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Customer First Name</label>
                <input type="text" 
                    name="firstname" 
                    class="form-control">
            </div>
            <div class="form-group">
                <label>Customer Last Name</label> 
                <input type="text"
                    name="lastname" 
                    class="form-control">
            </div>
            <div class="form-group">
                <label>Last 4 digits of credit card number</label>
                <input type="text" 
                    name="credit_card_number" 
                    class="form-control">
            </div>
        </div>
    </div>
    </div>
</div>