@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <a href="{{ url(sprintf('agents-csr/%s/edit', $csr->id)) }}" class="btn btn-primary-outline">
            <i class="fa fa-edit"></i> 
            {{ trans('app.edit') }} {{ trans('app.agents_csr') }}
        </a>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-8">
                @include('agent_csr.partials.details')
            </div>
            <div class="col-md-4">
                @include('agent_csr.partials.details-agent')
            </div>
        </div>
    </section>
@endsection
