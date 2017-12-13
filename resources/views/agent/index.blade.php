@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Agents List </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('agent.partials.table')
        </div>
    </section>
@endsection
