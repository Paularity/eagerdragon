@extends('layouts.dashboard')
    
@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Add a Record </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
        @include('flash.success')
            <form role="form" method="POST" action="{{ url('virtual-terminal') }}">
            {{ csrf_field() }}
                @include('virtual-terminal.partials.create.form-customer-info')
                @include('virtual-terminal.partials.create.form-credit-card-info')
                @include('virtual-terminal.partials.create.form-billing-info')
                @include('virtual-terminal.partials.create.form-shipping-info')
                <div class="row">
                    <div class="col-md-12">                        
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ trans('app.submit') }}
                        </button> 
                    </div>
                </div>
            </form>          
        </div>
    </section>
@include('modals.new-customer')
@endsection