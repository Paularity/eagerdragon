@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <a href="{{ url(sprintf('customers/%s/edit', $customer->id)) }}" class="btn btn-primary-outline">
            <i class="fa fa-edit"></i> 
            Edit Customer
        </a>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-8">
                @include('customer.partials.details')
            </div>
            <div class="col-md-4">
                @include('customer.partials.details-merchant')
            </div>
        </div>
    </section>
@endsection
