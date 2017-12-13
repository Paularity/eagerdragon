@extends('layouts.default')

@section('content') 
	<div class="app blank">
            <article class="content">
                <div class="error-card global">
                    <div class="error-title-block">
                        <h1 class="error-title">404</h1>
                        <h2 class="error-sub-title"> Sorry, page not found </h2>
                    </div>
                    <div class="error-container visible">
                        <br/>                        
                        <br/>                        
                        <a class="btn btn-primary" href="{{ url('/dashboard') }}">
                            <i class="fa fa-angle-left"></i> Back to where I belong! 
                        </a>
                    </div>
                </div>
            </article>
        </div>
@endsection
