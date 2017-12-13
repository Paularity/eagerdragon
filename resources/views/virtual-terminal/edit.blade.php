@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Edit User </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
        @include('flash.success')
            <form role="form" method="POST" 
                action="{{ url(sprintf('virtual-terminal/%s', $vt->id)) }}">
                    {{ csrf_field() }}  
                    <input name="_method" type="hidden" value="PATCH">
                    <input name="vt_id" type="hidden" value="{{ $vt->id }}"> 
                    @include('virtual-terminal.partials.edit.form-customer-info')
                    @include('virtual-terminal.partials.edit.form-billing-info')
                    @include('virtual-terminal.partials.edit.form-shipping-info')
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