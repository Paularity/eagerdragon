@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Edit Agent CSR </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">            
            <form role="form" method="POST" action="{{ url(sprintf('agents-csr/%s', $csr->id)) }}">
                <div class="col-md-12">
                    @include('agent_csr.partials.agent_csr-edit-form')
                </div> 
            </form>
        </div>
    </section>
@endsection
