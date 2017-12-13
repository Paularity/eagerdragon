@extends('layouts.dashboard')
    
@section('content')
    <div class="title-block">
        <h1 class="title"> My Profile </h1>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                @include('user.partials.details')
            </div>       
        </div>
    </section>
@endsection
