@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <a href="{{ url(sprintf('processors/%s/edit', $processor->id)) }}" class="btn btn-primary-outline">
            <i class="fa fa-edit"></i>
            Edit
        </a>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                @include('processor.partials.details')
            </div>
        </div>
    </section>
@endsection
