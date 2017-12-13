@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Payment Details
                    <span class="pull-right">
                        <i class="fa fa-cc-visa"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-amex"></i>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
            @include('flash.success')
            <form role="form" method="POST" action="{{ url('transactions') }}">
                {{ csrf_field() }}
                @include('transaction.partials.form')
                <div class="col-md-12">                        
                    <button type="submit" class="btn btn-block btn-primary">
                        {{ trans('app.submit') }}
                    </button> 
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection