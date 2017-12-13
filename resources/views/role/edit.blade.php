@extends('layouts.dashboard')
    
@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Edit Role </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                @include('role.partials.edit-role-form')
            </div>            
        </div>
    </section>
@endsection
