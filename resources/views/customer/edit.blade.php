@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> {{ trans('app.edit_customer') }} </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">            
            <form role="form" method="POST" action="{{ url(sprintf('customers/%s', $customer->id)) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <input name="customer_id" type="hidden" value="{{ $customer->id }}">
                <div class="col-md-12">
                    @include('flash.success')
                    @include('customer.partials.customer-edit-form')
                </div> 
            </form>
        </div>
    </section>
@endsection
