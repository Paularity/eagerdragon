@extends('layouts.dashboard')
	
@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Add New Role </h3>
    </div>
    <section class="section">        
        @include('role.partials.create-role-form')
    </section>
@endsection
