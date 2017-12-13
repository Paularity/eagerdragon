@extends('layouts.dashboard')
	
@section('content')
    <div class="title-block">
        <h1 class="title"> Roles List </h1>
    </div>
    <section class="section">
        <div class="row">
            @include('role.partials.table')
        </div>
    </section>
@endsection
