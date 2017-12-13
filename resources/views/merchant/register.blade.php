@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="subtitle-block">
                    <h3> MERCHANT SERVICES APPLICATION AND AGREEMENT </h3>
                </div>
                @include('flash.success')
                <form role="form" method="POST" action="{{ url('merchant-registration') }}">

                    {{ csrf_field() }}

                    @include('merchant.partials.create-input-fields.account')
                    @include('merchant.partials.create-input-fields.business')
                    @include('merchant.partials.create-input-fields.ownership')

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
    </div>
@endsection