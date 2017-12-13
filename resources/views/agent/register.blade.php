@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="subtitle-block">
                    <h3 class="text-center"> REFERRAL PARTNER “AGENT” APPLICATION </h3>
                </div>
                <div class="card">
                    @include('flash.success')
                    <form role="form" method="POST"
                        action="{{ url('agent-registration') }}">

                        {{ csrf_field() }}

                        @include('agent.partials.create-input-fields.general')

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
    </div>
@endsection