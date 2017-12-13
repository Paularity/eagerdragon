@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Users List </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('user.partials.search-form')
            @include('user.partials.table')
        </div>
    </section>
@endsection
