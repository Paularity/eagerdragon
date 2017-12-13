@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <a href="{{ url(sprintf('agent-accounts/%s/edit', $user->id)) }}" class="btn btn-primary-outline">
            <i class="fa fa-edit"></i> 
            Edit Agent
        </a>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                @include('agent.partials.panel')
            </div> 
        </div>
    </section>
@endsection
