@extends('layouts.default')

@section('content') 
	<div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <h1 class="auth-title">
                        EAGERDRAGON 
                    </h1>
                </header>
                <div class="auth-content">
                    @include('auth.partials.access-code-form')                    
                </div>
            </div>                
        </div>
    </div>
@endsection
