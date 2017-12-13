@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Edit Chargeback </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">            
            <form role="form" method="POST" 
                action="{{ url(sprintf('chargebacks/%s', $chargeback->id)) }}">
                <div class="col-md-12">
                    @include('flash.success')                    
                    @include('chargeback.partials.edit-form')
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"> 
                            <br/>
                            <button type="submit" class="btn btn-block btn-primary">
                                {{ trans('app.submit') }}
                            </button> 
                        </div>
                    </div>  
                </div>
            </form>
        </div>
    </section>
@endsection
