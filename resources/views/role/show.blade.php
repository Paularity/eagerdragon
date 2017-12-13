@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <a href="{{ url(sprintf('roles/%s/edit', $role->id)) }}" class="btn btn-primary-outline">
            <i class="fa fa-edit"></i> 
            Edit This Role
        </a>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                @include('role.partials.details')
            </div>            
        </div>
    </section>
@endsection
