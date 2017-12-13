<div class="col-md-8">
    <div class="card card-block sameheight-item">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <input name="user_id" type="hidden" value="{{ $user->id }}">

        @if(session()->has('success'))
            <div class="alert alert-success fade in alert-dismissable">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                    <label class="control-label">
                        Firstname <span class="required">*</span>
                    </label>
                    <input type="text"
                        name="firstname"
                        class="form-control underlined"
                        @if (old('firstname'))
                            value="{{ old('firstname') }}"
                        @elseif (isset($user))
                            value="{{ $user->firstname }}"
                        @endif
                        required
                    >
                    @if ($errors->has('firstname'))
                        <span class="has-error">
                            {{ $errors->first('firstname') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{$errors->has('lastname') ? 'has-error' : ''}}">
                    <label class="control-label">
                        Lastname <span class="required">*</span>
                    </label>
                    <input type="text"
                        name="lastname"
                        class="form-control underlined"
                        @if (old('lastname'))
                            value="{{ old('lastname') }}"
                        @elseif (isset($user))
                            value="{{ $user->lastname }}"
                        @endif
                        required
                    >
                    @if ($errors->has('lastname'))
                        <span class="has-error">
                            {{ $errors->first('lastname') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                    <label class="control-label">
                        Email <span class="required">*</span>
                    </label>
                    <input type="email"
                        name="email"
                        class="form-control underlined"
                        @if (old('email'))
                            value="{{ old('email') }}"
                        @elseif (isset($user))
                            value="{{ $user->email }}"
                        @endif
                        required
                    >
                    @if ($errors->has('email'))
                        <span class="has-error">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
                    <label class="control-label">
                        Username <span class="required">*</span>
                    </label>
                    <input type="text"
                        name="username"
                        class="form-control underlined"
                        @if (old('username'))
                            value="{{ old('username') }}"
                        @elseif (isset($user))
                            value="{{ $user->username }}"
                        @endif
                        required
                    >
                    @if ($errors->has('username'))
                        <span class="has-error">
                            {{ $errors->first('username') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{$errors->has('mobile_number') ? 'has-error' : ''}}">
                    <label class="control-label">
                        Mobile Number <span class="required">*</span>
                    </label>
                    <input type="text"
                        name="mobile_number"
                        class="form-control underlined"
                        @if (old('mobile_number'))
                            value="{{ old('mobile_number') }}"
                        @elseif (isset($user))
                            value="{{ $user->mobile_number }}"
                        @endif
                    >
                    @if ($errors->has('mobile_number'))
                        <span class="has-error">
                            {{ $errors->first('mobile_number') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ !$errors->has('role') ?: 'has-error' }}">
                    <label class="control-label">
                        Role <span class="required">*</span>
                    </label>
                    <select class="form-control underlined" name="role" required>
                        <option value=""> Select Role </option>
                        @foreach($rolesList as $role)
                            <option value="{{$role->name}}"
                                @if (
                                        old('role') === $role->name ||
                                        isset($user) &&
                                        $role->name === $user->role
                                    )
                                        selected
                                    @endif
                                >
                                {{ $role->title }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="has-error">
                            {{ $errors->first('role') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">
                    <label class="control-label">
                        Status <span class="required">*</span>
                    </label>
                    <select class="form-control underlined" name="status" required>
                        <option value=""> Select Status </option>
                        @foreach($userPresetStatus as $status)
                            <option value="{{ $status }}"
                                @if (
                                        old('status') === $status ||
                                        isset($user) &&
                                        $user->status === $status
                                    )
                                        selected
                                    @endif
                            >
                                {{ ucwords($status) }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <span class="has-error">
                            {{ $errors->first('status') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>