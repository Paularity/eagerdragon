
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
                    <form method="POST" 
                        action="{{ route('password.email') }}"
                    >
                        {{ csrf_field() }} 
                        @if(session()->has('status') || $errors->has('email'))
                            <div class="alert alert-success fade in alert-dismissable">
                                If your email address is valid then you should receive
                                an email containing a password reset link.
                            </div>
                        @endif                        
                        <div class="form-group"> 
                            <input id="email" 
                                type="text" 
                                class="form-control" 
                                placeholder="Your Email" 
                                name="email"
                                value=""
                                required
                            > 
                        </div>
                        
                        <div class="form-group"> 
                            <button type="submit" class="btn btn-block btn-primary">
                                Send Password Reset Link
                            </button> 
                        </div>                            
                    </form>
                </div>
            </div>                
        </div>
    </div>
@endsection
