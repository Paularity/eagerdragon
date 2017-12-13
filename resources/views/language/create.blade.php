@extends('layouts.dashboard')
	
@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Add New Language </h3>
    </div>
    <section class="section">        
        @include('language.partials.form')
    </section>
@endsection
