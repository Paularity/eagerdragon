@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> {{ trans('app.general_settings') }} </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">            
            @include('setting.partials.table')
            <!-- MODALS -->
            @include('modals.new-settings')
            @include('modals.change-logo')
        </div>
    </section>
@endsection
