@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Agent List </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('sub-agent.partials.table')
        </div>
    </section>
@endsection