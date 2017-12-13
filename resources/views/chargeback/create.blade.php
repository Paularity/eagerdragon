@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> {{ trans('app.add_new_chargeback') }} </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">            
            <form role="form" method="POST" action="/chargebacks">
            {{ csrf_field() }}
                <div class="col-md-12">
                    @include('flash.success')
                    @include('chargeback.partials.chargeback-create-form')
                </div> 
            </form>
        </div>
    </section>
@endsection
