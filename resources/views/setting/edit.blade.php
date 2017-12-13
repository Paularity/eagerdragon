@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> Edit Settings </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">       
            <form role="form" method="POST" 
                action="{{ url(sprintf('settings/%s', $setting->id)) }}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <input name="id" type="hidden" value="{{ $setting->id }}"> 
                    @include('setting.partials.edit-form')
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
