<div class="card card-block sameheight-item">                    
    <div class="card-title-block">
        <h3 class="title">Edit Chargeback Information</h3>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group {{$errors->has('merchant_id') ? 'has-error' : ''}}">            
                <label class="control-label">{{ trans('app.merchants') }}</label>
                <p>
                    @foreach ($merchantList as $merchant)
                        @if ($chargeback['merchant_id'] == $merchant->id)
                            {{ $merchant->firstname }} 
                            {{ $merchant->lastname }}
                        @endif
                    @endforeach
                </p>
            </div>

            <div class="form-group">
                <label class="control-label">
                    {{ trans('app.firstname') }}
                </label>
                <input type="text" 
                    name="firstname" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->firstname }}"
                    readonly 
                >
            </div>

            <div class="form-group">
                <label class="control-label">
                    {{ trans('app.lastname') }}
                </label>
                <input type="text" 
                    name="lastname" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->lastname }}"
                    readonly 
                >
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group {{$errors->has('merchant_id') ? 'has-error' : ''}}">            
                <label class="control-label">Sale Value</label>
                <input type="text" 
                    name="sale_value" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->sale_value }}"
                    readonly 
                >
            </div>

            <div class="form-group">
                <label class="control-label">
                   Sale Transaction ID
                </label>
                <input type="text" 
                    name="sale_transaction_id" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->sale_transaction_id }}"
                    readonly 
                >
            </div>

            <div class="form-group">
                <label class="control-label">
                    Sale Date
                </label>
                <input type="text" 
                    name="sale_date" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->sale_date }}"
                    readonly 
                >
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                   Credit Card
                </label>
                <input type="text" 
                    name="credit_card_number" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->credit_card_number }}"
                    readonly 
                >
            </div>

            <div class="form-group">
                <label class="control-label">
                    Credit Card Type
                </label>
                <input type="text" 
                    name="credit_card_type" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->credit_card_type }}"
                    readonly 
                >
            </div>
        </div>
    </div>
    
    <hr class="dotted">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Request Date
                </label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" 
                        name="date" 
                        class="form-control datepicker"
                        value="{{ $chargeback->date }}"
                    >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Amount
                </label>
                <input type="text" 
                    name="amount" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->amount }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Request Type
                </label>
                <input type="text" 
                    name="request_type" 
                    class="form-control form-control-sm"
                    value="chargeback">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">
                    Reason
                </label>
                <input type="text" 
                    name="reason_code" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->reason_code }}" 
                    readonly 
                >
            </div>
        </div>
    </div>

    <hr class="dotted">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Response Due Date
                </label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" 
                        name="response_date" 
                        class="form-control datepicker"
                        value="{{ $chargeback->response_date }}"
                    >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Update Date
                </label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" 
                        name="update_date" 
                        class="form-control datepicker"
                        value="{{ $chargeback->update_date }}"
                    >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Charged Date
                </label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" 
                        name="charged_date" 
                        class="form-control datepicker"
                        value="{{ $chargeback->charged_date }}"
                    >
                </div>
            </div>
        </div>
    </div>

    <hr class="dotted">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Dispute Result
                </label>
                <select name="dispute_result" class="form-control form-control-sm">
                <option hidden></option>
                @foreach ($disputeResult as $dr)
                    <option value="{{ $dr }}" 
                        @if ($chargeback->dispute_result == $dr)
                            selected
                        @endif
                    >
                        {{ ucfirst($dr) }}
                    </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Status
                </label>
                <select name="status" class="form-control form-control-sm">
                @foreach ($statusList as $key => $status)
                    <option value="{{ $key }}" 
                        @if ($key == $chargeback->status)
                            selected
                        @endif
                    >
                        {{ $status }}
                    </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Description
                </label>
                <input type="text" 
                    name="description" 
                    class="form-control form-control-sm"
                >
            </div>
        </div>
    </div>

    <hr class="dotted">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Reference Number
                </label>
                <input type="text" 
                    name="reference_number" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->reference_number }}" 
                    readonly 
                >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Currency
                </label>
                <input type="text" 
                    name="currency" 
                    class="form-control form-control-sm"
                    value="{{ $chargeback->currency }}" 
                    readonly 
                >                
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <br/>
                <label class="control-label">
                    <input type="checkbox"
                        name="new_chargeback"
                        class="checkbox" 
                        value="{{ $chargeback->new }}"
                        checked 
                    >
                    <span>New Chargeback</span>
                </label>
            </div>
        </div>
    </div>

    <hr class="dotted">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    Comment
                </label>
                <textarea 
                    name="comment" 
                    class="form-control"
                >{{ $chargeback->comment }}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">
                    New Response
                </label>
                <textarea name="response_text" 
                    class="form-control"
                    placeholder="(Enter new response here)" 
                >{{ $chargeback->response_text }}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <br/><br/>
                <button class="btn btn-primary btn-block">
                    <i class="fa fa-save"></i>
                    Save
                </button>
            </div>
        </div>
    </div>

    <hr class="dotted">

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <a href="{{ url(sprintf('chargebacks/downloadzip/%s', $chargeback->id)) }}" 
                    class="btn btn-warning btn-block">
                    <i class="fa fa-download"></i>
                    Download ZIP
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <a href="{{ url('/chargebacks/%s', $chargeback->id) }}" class="btn btn-warning btn-block">
                    <i class="fa fa-trash"></i>
                    Reset!
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <a href="{{ url(sprintf('chargebacks/sendtobank/%s', $chargeback->id)) }}" 
                    class="btn btn-warning btn-block">
                    <i class="fa fa-bank"></i>
                    Send To Bank
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <button class="btn btn-warning btn-block">
                    <i class="fa fa-search"></i>
                    <a href="{{ url(sprintf('transactions/%s', $chargeback->sale_transaction_id)) }}"
                        target="_blank" 
                        style="color: #fff; text-decoration: none;" 
                    >
                        Original Transaction
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>