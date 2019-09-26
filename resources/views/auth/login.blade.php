@extends('layouts.app')
@section('content')
    <div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Login
        </h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field mb-6">
            <label for="email" class="label text-sm mb-2 block">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field mb-6">
            <label for="password" class="label text-sm mb-2 block">{{ __('Password') }}</label>
                <input id="password" type="password" class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field mb-6">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="field mb-6">
                <button type="submit" class="button is-link mr-2">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
@endsection
