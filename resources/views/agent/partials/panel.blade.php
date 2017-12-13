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
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            data-toggle="tab"
                            aria-expanded="true"
                            class="nav-link"
                            href="#csr"
                            role="tab">
                            CSRs
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
                        @include('agent.partials.details')
                    </div>
                    <div role="tabpanel"
                        class="tab-pane fade"
                        aria-expanded="false"
                        id="csr">
                        @include('agent.partials.agent-csr-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>