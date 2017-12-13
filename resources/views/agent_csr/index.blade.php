@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Agent CSRs List </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('agent_csr.partials.table')
        </div>
    </section>
@endsection
