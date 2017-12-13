@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Results </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('transaction.partials.results')
        </div>
    </section>
@endsection
