<div class="row sameheight-container">
    <div class="col col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header card-header-sm bordered">
                <ul class="nav nav-tabs pull-right" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="nav-link"
                            href="#profile"
                            role="tab">
                            Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="nav-link"
                            href="#business"
                            role="tab">
                            Business
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="nav-link"
                            href="#bank"
                            role="tab">
                            Bank
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-block">
                <div class="tab-content">
                    <div role="tabpanel"
                        class="tab-pane fade active in"
                        aria-expanded="true"
                        id="profile">
                        @include('merchant.partials.panel-data.account')
                    </div>
                    <div role="tabpanel"
                        class="tab-pane fade"
                        aria-expanded="false"
                        id="business">
                        @include('merchant.partials.panel-data.business')
                    </div>
                    <div role="tabpanel"
                        class="tab-pane fade"
                        aria-expanded="false"
                        id="bank">
                        @include('merchant.partials.panel-data.bank')
                    </div>
                    <div role="tabpanel"
                        class="tab-pane fade"
                        aria-expanded="false"
                        id="taxes">
                    </div>
                    @can('edit-fees')
                        <div role="tabpanel"
                            class="tab-pane fade"
                            aria-expanded="false"
                            id="fees">
                        </div>
                    @endcan
                    <div role="tabpanel"
                        class="tab-pane fade"
                        aria-expanded="false"
                        id="discounts">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>