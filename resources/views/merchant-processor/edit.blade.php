@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Edit Merchant Processor</h3>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="POST"
                    action="{{ url(sprintf('merchant-accounts/%s/processors/%s',
                        $merchantAccount->id,
                        $merchantProcessor->id)) }}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    @if(session()->has('success'))
                        <div class="alert alert-success fade in alert-dismissable">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @include('merchant-processor.partials.create-form')
                    <div class="row">
                        <div class="col-md-8">
                            @include('merchant-processor.partials.settings-form')
                        </div>
                        <div class="col-md-4">
                            @include('merchant-processor.partials.transaction-credentials')
                            @include('merchant-processor.partials.transaction-permissions')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
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
