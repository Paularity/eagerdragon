@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title">{{ $businessInfo->business_name }} Processors List </h1>
        <a href="{{
            url(sprintf('merchant-accounts/%s/processors/create', $merchantAccount->id)) }}"
            class="btn btn-success-outline btn-sm"
            title="View"
            >
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>
    <section class="section">
        <div class="row">
            @include('merchant-processor.partials.table')
        </div>
    </section>
@endsection
