@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Languages List </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('language.partials.table')
        </div>
    </section>
@endsection
