@extends('layouts.default')

@section('content') 
	<div class="app blank">
            <article class="content">
                <div class="error-card global">
                    <div class="error-title-block">                        
                        <h1 class="error-title">403</h1>
                        <h2 class="error-sub-title"> {{ trans('app.forbidden') }}! </h2>
                    </div>
                    <div class="error-container visible">
                        <br/>                        
                        <br/>                        
                        <a class="btn btn-primary" href="{{ url('/dashboard') }}">
                            <i class="fa fa-angle-left"></i> 
                            {{ trans('app.back_where_belong') }} 
                        </a>
                    </div>
                </div>
            </article>
        </div>
@endsection
