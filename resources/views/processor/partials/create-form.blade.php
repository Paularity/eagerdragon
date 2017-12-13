<div class="row sameheight-container">
    <div class="col-md-12">
        <div class="card card-block sameheight-item">
            <form role="form" method="POST" action="{{ url('processors') }}">
                {{ csrf_field() }}
                @if(session()->has('success'))
                    <div class="alert alert-success fade in alert-dismissable">
                        {{ session()->get('success') }}
                    </div>
                @endif
                    <div class="col-md-4">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label class="control-label">
                                Name <span class="required">*</span>
                            </label>
                            <input type="text"
                                name="name"
                                class="form-control underlined"
                                value="{{ old('name') }}"
                                required
                            >
                            @if ($errors->has('name'))
                                <span class="has-error">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{$errors->has('short_name') ? 'has-error' : ''}}">
                            <label class="control-label">
                                Short Name <span class="required">*</span>
                            </label>
                            <input type="text"
                                name="short_name"
                                class="form-control underlined"
                                value="{{ old('short_name') }}"
                                required
                            >
                            @if ($errors->has('short_name'))
                                <span class="has-error">
                                    {{ $errors->first('short_name') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label class="control-label">
                                Email <span class="required">*</span>
                            </label>
                            <input type="email"
                                name="email"
                                class="form-control underlined"
                                value="{{ old('email') }}"
                                required
                            >
                            @if ($errors->has('email'))
                                <span class="has-error">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group {{$errors->has('wire_fee') ? 'has-error' : ''}}">
                            <label class="control-label">
                                Wire Fee <span class="required">*</span>
                            </label>
                            <input type="text"
                                name="wire_fee"
                                class="form-control underlined"
                                value="{{ old('wire_fee') }}"
                                required
                            >
                            @if ($errors->has('wire_fee'))
                                <span class="has-error">
                                    {{ $errors->first('wire_fee') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">
                                Timezone <span class="required">*</span>
                                </label>
                            <select class="form-control underlined form-control-sm" name="timezone" required>
                                <option value=""> Select </option>
                                @foreach($timezones as $key => $timezone)
                                    <option value="{{$key}}"
                                        @if (old('timezone') === $key)
                                            selected
                                        @endif
                                        >
                                        {{ $timezone }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">
                                Processor Type <span class="required">*</span>
                            </label>
                            <select class="form-control underlined form-control-sm" name="type" required>
                                <option value=""> Select </option>
                                @foreach($processorTypes as $key => $type)
                                    <option value="{{$key}}"
                                        @if (old('type') === $key )
                                            selected
                                        @endif
                                        >
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">
                                <input class="checkbox "
                                 @if(old('is_integrated')) checked @endif
                                type="checkbox" name="is_integrated">
                                <span>Is Integrated</span>
                            </label>
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