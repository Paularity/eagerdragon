@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Add New Processor </h3>
    </div>
    <section class="section">
        @include('processor.partials.create-form')
    </section>
@endsection
