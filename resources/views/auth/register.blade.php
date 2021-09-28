@extends('main')

@section('title') {{ __('auth.actions.register') }} @endsection

@section('content')
    <section class="auth wrapper">
        <div class="card register">
            <div class="card-header border-bottom-0 text-center">
                <h2 class="mb-0">{{ __('auth.actions.register') }}</h2>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label required-field">{{ __('users.name') }}</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('user.name') }}"
                            required
                        />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="password" class="form-label required-field">{{ __('users.password') }}</label>
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
                    <div class="form-group">
                        <label for="passwordConfirmation" class="form-label required-field">{{ __('users.confirm') }}</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="passwordConfirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            required
                        />
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="button button--transparent--success px-5">
                            {{ __('auth.actions.register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
