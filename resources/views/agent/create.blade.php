@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> {{ trans('app.add_new_agent') }} </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
            @include('flash.success')
                <form role="form" method="POST" 
                    action="{{ url('agent-accounts') }}">
                        {{ csrf_field() }}
                        @include('agent.partials.create-input-fields.basic-info')
                        @include('agent.partials.create-input-fields.support-contact-info')
                        @include('agent.partials.create-input-fields.commission-payment-info')
                        @include('agent.partials.create-input-fields.account-info')
                        <div class="row">
                            <div class="form-group"> 
                                <br/>
                                <button type="submit" class="btn btn-block btn-primary">
                                    Submit
                                </button> 
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>
@endsection
