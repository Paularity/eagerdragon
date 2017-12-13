<div class="row sameheight-container">
    <div class="col-md-12">
        <div class="card card-block sameheight-item">
            <form role="form" method="POST"
                action="{{ url(sprintf('roles/%s', $role->id)) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                <input name="role_id" type="hidden" value="{{ $role->id }}">

                @if(session()->has('success'))
                    <div class="alert alert-success fade in alert-dismissable">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="control-label">
                                Name <span class="required">*</span>
                            </label>
                            <input type="text"
                                name="name"
                                class="form-control underlined"
                                @if (old('name'))
                                    value="{{ old('name') }}"
                                @elseif (isset($role))
                                    value="{{ $role->name }}"
                                @endif
                                required
                                placeholder="Ex. master-admin"
                            >
                            @if ($errors->has('name'))
                                <span class="has-error">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <label class="control-label">
                                Title <span class="required">*</span>
                            </label>
                            <input type="text"
                                name="title"
                                class="form-control underlined"
                                @if (old('name'))
                                    value="{{ old('title') }}"
                                @elseif (isset($role))
                                    value="{{ $role->title }}"
                                @endif
                                required
                                placeholder="Ex. Master Administrator"
                            >
                            @if ($errors->has('title'))
                                <span class="has-error">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <br/>
                    <button type="submit" class="btn btn-block btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>