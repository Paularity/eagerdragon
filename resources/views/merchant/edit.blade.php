@extends('layouts.dashboard')

 @section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Edit Merchant </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
            @include('flash.success')
                <form role="form" method="POST"
                    action="{{ url(sprintf('merchant-accounts/%s', $merchant->id)) }}">

                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <input name="user_id" type="hidden" value="{{ $merchant->id }}">

                    @include('merchant.partials.edit-input-fields.account')
                    @include('merchant.partials.edit-input-fields.business')
                    @include('merchant.partials.edit-input-fields.bank')
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
