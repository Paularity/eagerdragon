@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Edit Agent </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">            
            <form role="form" method="POST" 
                action="{{ url(sprintf('agent-accounts/%s', $user->id)) }}">
                {{ csrf_field() }}  
                <input name="_method" type="hidden" value="PATCH">
                <input name="user_id" type="hidden" value="{{ $user->id }}"> 
                <div class="col-md-12">
                    @include('flash.success')
                    @include('agent.partials.edit-input-fields.basic-info')
                    @include('agent.partials.edit-input-fields.support-contact-info')
                    @include('agent.partials.edit-input-fields.commission-payment-info')
                    @include('agent.partials.edit-input-fields.account-info')
                </div>
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
    </section>
@endsection
