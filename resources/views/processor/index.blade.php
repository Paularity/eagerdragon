@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Processors List </h1>
    </div>
    <section class="section">
        <div class="row">
            {{-- @include('processor.partials.search-form') --}}
            @include('processor.partials.table')
        </div>
    </section>
@endsection
