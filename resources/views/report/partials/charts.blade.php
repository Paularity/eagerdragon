<div class="row sameheight-container">
    <div class="col col-md-12 col-sm-12 col-xs-12">
        <div class="card">
             <div class="form-group">
                <h3 class="title"> Charts </h3>
            </div>
            <div class="card-header card-header-sm bordered">
                <ul class="nav nav-tabs pull-right" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="nav-link"
                            href="#sales_and_refund"
                            role="tab">
                            Sales & Refund
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="nav-link"
                            href="#transaction_count"
                            role="tab">
                            Transaction Count
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="nav-link"
                            href="#chargebacks"
                            role="tab">
                            Chargebacks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="nav-link"
                            href="#volume"
                            role="tab">
                            Chargeback Ratio By Volume
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="nav-link"
                            href="#reasons"
                            role="tab">
                            Chargeback / Decline Reasons
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-block">
                <div class="tab-content">
                    <div role="tabpanel"
                        class="tab-pane fade active in"
                        aria-expanded="true"
                        id="sales_and_refund">
                        @include('report.partials.charts.sales-and-refund')
                    </div>
                    <div role="tabpanel"
                        class="tab-pane fade"
                        aria-expanded="false"
                        id="transaction_count">
                        @include('report.partials.charts.transaction-count')
                    </div>
                    <div role="tabpanel"
                        class="tab-pane fade"
                        aria-expanded="false"
                        id="chargebacks">
                        @include('report.partials.charts.chargebacks')
                    </div>
                    <div role="tabpanel"
                        class="tab-pane fade"
                        aria-expanded="false"
                        id="volume">
                        @include('report.partials.charts.volume')
                    </div>
                    <div role="tabpanel"
                        class="tab-pane fade"
                        aria-expanded="false"
                        id="reasons">
                        @include('report.partials.charts.reasons')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>