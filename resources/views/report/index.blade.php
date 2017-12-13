@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Reports </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('report.partials.filter')
            @include('report.partials.results')
            @include('report.partials.charts')
        </div>
    </section>
@endsection
