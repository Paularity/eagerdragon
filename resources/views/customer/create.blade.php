@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> {{ trans('app.add_new_customer') }} </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">            
            <form role="form" method="POST" action="/customers">
            {{ csrf_field() }}
                <div class="col-md-12">
                    @include('flash.success')
                    @include('customer.partials.customer-create-form')
                </div> 
            </form>
        </div>
    </section>
@endsection
