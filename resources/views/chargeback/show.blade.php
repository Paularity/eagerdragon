@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
            @include('flash.success')
            <form role="form" method="POST" 
                action="{{ url(sprintf('chargebacks/%s', $chargeback->id)) }}">
                {{ csrf_field() }}  
                <input name="_method" type="hidden" value="PATCH">
                <input name="chargeback_id" type="hidden" value="{{ $chargeback->id }}"> 
                @include('chargeback.partials.details')
            </form>
                @include('chargeback.partials.supporting-docs')
            </div> 
        </div>
    </section>
@endsection
