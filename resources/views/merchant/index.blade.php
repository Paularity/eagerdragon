@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Merchants List </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('merchant.partials.search-form')
            @include('merchant.partials.table')
        </div>
    </section>
@endsection
