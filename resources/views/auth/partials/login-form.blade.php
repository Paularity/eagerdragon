<form id="login-form"
	method="POST"
		action="{{ route('login') }}"
	>
	{{ csrf_field() }}
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="form-group">
        <label for="username">Username or Email</label>
        <input id="username"
			type="text"
			class="form-control underlined"
			placeholder="Your Username or Email"
			name="username"
            value="eagerdragon@1minfunnel.com" 
            required
        >
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password"
            class="form-control underlined"
            name="password"
            id="password"
            placeholder="Your password"
            value="eagerpassword" 
            required
        >
    </div>
    <div class="form-group">
        <label for="remember">
            <input class="checkbox" id="remember" type="checkbox">
            <span>Remember me</span>
        </label>
        <a href="{{ url('password/reset') }}"
            class="forgot-btn pull-right">
            Forgot password?
        </a>
    </div>
    <div class="form-group">

        <a href="{{ url('merchant-registration') }}"
            class="pull-left">
            Register as Merchant
        </a>

        <a href="{{ url('agent-registration') }}"
            class="pull-right">
            Register as Agent
        </a>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">
            Login
        </button>
    </div>
</form>