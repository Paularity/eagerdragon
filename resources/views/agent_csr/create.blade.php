@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Add New Agent CSR </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card sameheight-item">
                    <form role="form" method="POST" action="{{ url('agents-csr') }}">
                            @include('agent_csr.partials.agent_csr-create-form')
                    </form>          
                </div>
            </div>
        </div>
    </section>
@endsection
