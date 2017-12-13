<div class="card">
    <div class="form-group">
        <h3 class="title"> Results </h3>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            @include('report.partials.transaction-table')
            @include('report.partials.chargeback-table')
        </div>
    </div>
</div>