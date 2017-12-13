@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <a href="{{ url(sprintf('virtual-terminal/%s/edit', $vt->id)) }}" class="btn btn-primary-outline">
            <i class="fa fa-edit"></i> 
            {{ trans('app.edit') }}
        </a>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            @include('virtual-terminal.partials.show.customer-info')
            @include('virtual-terminal.partials.show.billing-info')
            @include('virtual-terminal.partials.show.shipping-info')
        </div>
    </section>
@endsection
