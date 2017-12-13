<div class="card card-block">
    <div class="card-title-block">
        <h3 class="title">Transaction Processing Credentials</h3>
    </div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
                <label class="control-label">
                    Username <span class="required">*</span>
                </label>
                <input type="text"
                	name="username"
                	class="form-control"
                	value="{{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        ? $merchantProcessor->pivot->username
                        : old('username')
                    }}"
                	required
                >
                @if ($errors->has('username'))
                    <span class="has-error">
                        {{ $errors->first('username') }}
                    </span>
                @endif
            </div>

            <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                <label class="control-label">
                    Password <span class="required">*</span>
                </label>
                <input type="text"
                	name="password"
                	class="form-control"
                	value="{{
                        isset($merchantProcessor)
                        && $merchantProcessor->pivot
                        ? $merchantProcessor->pivot->password
                        : old('password')
                    }}"
                	required
                >
                @if ($errors->has('password'))
                    <span class="has-error">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
		</div>
	</div>
</div>