@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Audit Logs </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('audit-log.partials.table')
        </div>
    </section>
@endsection
