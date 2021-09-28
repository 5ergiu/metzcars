@extends('main')

@section('title') {{ __('auth.actions.login') }} @endsection

@section('content')
    <section class="auth wrapper">
        <div class="card login">
            <div class="card-header border-bottom-0 text-center">
                <h2>{{ __('auth.welcomeBack') }} 👋</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="email" class="form-label required-field">{{ __('users.email') }}</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required
                        />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label required-field">{{ __('users.password') }} </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required
                        />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="button button--transparent--success px-5">
                            {{ __('auth.actions.login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
