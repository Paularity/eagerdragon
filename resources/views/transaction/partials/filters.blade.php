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
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" value="" class="form-control datepicker" name="period_start_date">
                    </div>
                </div>
                <div id="end_date" class="form-group">
                    <label>Period End Date</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" value="" class="form-control datepicker" name="period_end_date">
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
                <label>Order ID </label> 
                <input type="text" class="form-control" name="invoice_number">
            </div>
            <div class="form-group">
                <label>Last 4 digits of credit card number </label> 
                <input type="text" class="form-control" name="credit_card_number_last_four" id="last4_ccn">
            </div>                  
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Payment Method</label>
                <select name="payment_method" class="form-control">
                        <option value="all">All</option>
                    @foreach ($paymentMethod as $method)
                        <option value="{{ $method }}">
                            {{ ucfirst($method) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Transaction Type</label> 
                <select class="form-control" name="transaction_type">
                        <option value="all">All</option>
                    @foreach ($transactionType as $type)
                        <option value="{{ $type }}">
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Transaction Status</label> 
                <select class="form-control m-b" id="transaction_status" name="transaction_status">
                    <option selected="selected" value="0">All</option>
                    <option value="2">Failed</option>
                    <option value="1">Succeeded</option>
                </select>
            </div>
        </div>
    </div>
    </div>
</div>