@extends('layouts.dashboard')
    
@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Add New User </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <form role="form" method="POST" action="{{ url('users') }}">
                @include('user.partials.create-form')
            
                @include('user.partials.abilities-form')
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"> 
                            <br/>
                            <button type="submit" class="btn btn-block btn-primary">
                                Submit
                            </button> 
                        </div>
                    </div>  
                </div>
            </form>          
        </div>
    </section>
@endsection
