<div class="row sameheight-container">
    <div class="col-md-8">        
        <div class="card card-block sameheight-item">                    
            <form role="form" method="POST" action="/language" enctype="multipart/form-data">
                {{ csrf_field() }}
                 @if(session()->has('success'))
                    <div class="alert alert-success fade in alert-dismissable">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="form-group {{$errors->has('foldername') ? 'has-error' : ''}}">
                    <label class="control-label">{{ trans('app.folder_name') }}</label>
                    <input type="text"
                        name="foldername" 
                        class="form-control underlined"
                        required
                        placeholder="Folder name only 2 letters"
                    >
                    @if ($errors->has('foldername'))                                    
                        <span class="has-error">
                            {{ $errors->first('foldername') }}
                        </span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('languagename') ? 'has-error' : ''}}">
                    <label class="control-label">{{ trans('app.language_name') }}</label>
                    <input type="text"
                        name="languagename" 
                        class="form-control underlined"
                        required
                        placeholder="Language name" 
                    >
                    @if ($errors->has('languagename'))                                    
                        <span class="has-error">
                            {{ $errors->first('languagename') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">{{ trans('app.choose_flag') }}</label>
                    <input type="file" 
                        name="flag_name" 
                        class="form-control underlined"
                    >
                </div>
                <div class="form-group">
                    <br/>
                    <button class="btn btn-block btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>