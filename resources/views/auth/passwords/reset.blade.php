
@extends('layouts.default')

@section('content')
    <div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <h1 class="auth-title">
                        EAGERDRAGON
                    </h1>
                </header>
                <div class="auth-content">
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">

                        @if (session()->has('info'))
                            <div class="alert alert-info fade in alert-dismissable">
                                {{ session('info') }}
                            </div>
                        @endif

                        @if ($errors->has('email'))
                            <div class="alert alert-danger fade in alert-dismissable">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        @if ($errors->has('password'))
                            <div class="alert alert-danger fade in alert-dismissable">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        @if ($errors->has('password_confirmation'))
                            <div class="alert alert-danger fade in alert-dismissable">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email"
                                type="text"
                                class="form-control underlined"
                                name="email"
                                value="{{ $email or old('email') }}"
                                autofocus
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"
                                class="form-control underlined"
                                name="password"
                                id="password"
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password"
                                class="form-control underlined"
                                name="password_confirmation"
                                id="password_confirmation"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
