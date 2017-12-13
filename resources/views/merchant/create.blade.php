@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Add New Merchant </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
            @include('flash.success')
                <form role="form" method="POST"
                    action="{{ url('merchant-accounts') }}">

                    {{ csrf_field() }}

                    @include('merchant.partials.create-input-fields.account')
                    @include('merchant.partials.create-input-fields.business')
                    @include('merchant.partials.create-input-fields.bank')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <br/>
                                <button type="submit" class="btn btn-block btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection