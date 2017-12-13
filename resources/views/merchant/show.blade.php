@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <a href="{{ url(sprintf('merchant-accounts/%s/edit', $merchant->id)) }}"
            class="btn btn-primary-outline">
            <i class="fa fa-edit"></i>
            Edit
        </a>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                @include('flash.success')
                @include('merchant.partials.panel')
            </div>
        </div>
    </section>
@endsection
