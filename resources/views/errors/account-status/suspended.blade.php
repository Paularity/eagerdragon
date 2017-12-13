@extends('layouts.default')

@section('content') 
	<div class="app blank">
            <article class="content">
                <div class="error-card global">
                    <div class="error-title-block">                        
                        <h1 class="error-title">403</h1>
                        <h2 class="error-sub-title"> 
                            Your account has been suspended.
                        </h2>
                    </div> 
                    @impersonating  
                        <div class="error-container visible">
                            <br/>                        
                            <br/>                        
                            <a class="btn btn-primary" href="{{ url('leaveImpersonation')}}">
                                <i class="fa fa-power-off icon"></i>
                                Leave Impersonation 
                            </a>
                        </div> 
                    @elseif (Auth::check())
                        <div class="error-container visible">
                            <br/>                        
                            <br/>                        
                            <a class="btn btn-primary" href="{{ url('logout')}}">
                                <i class="fa fa-power-off icon"></i>
                                Back 
                            </a>
                        </div>
                    @endImpersonating                   
                </div>
            </article>
        </div>
@endsection
