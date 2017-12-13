@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
            	@include('flash.success')
                @include('transaction.partials.details')
                @include('transaction.partials.customer-transaction-history')
            </div>
        </div>
    </section>
@endsection
