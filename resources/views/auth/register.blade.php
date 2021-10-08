@extends('main')

@section('title') {{ __('auth.actions.register') }} @endsection

@section('content')
    <section class="container">
        <div class="dark col-lg-5 mx-auto">
            <h3 class="text-center mb-4">{{ __('auth.actions.register') }}</h3>
            <form class="needs-validation" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-floating mb-4">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('user.name') }}"
                        placeholder="{{ __('users.name') }}"
                        required
                    />
                    <label for="name" class="form-label required-field">{{ __('users.name') }}</label>
                    @error('name') @include('elements.errorMessage') @enderror
                </div>
                <div class="form-floating mb-4">
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="{{ __('users.email') }}"
                        required
                    />
                    <label for="email" class="form-label required-field">{{ __('users.email') }}</label>
                    @error('email') @include('elements.errorMessage') @enderror
                </div>
                <div class="form-floating mb-4">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{ __('users.password') }}"
                        required
                    />
                    <label for="password" class="form-label required-field">{{ __('users.password') }}</label>
                    @error('password') @include('elements.errorMessage') @enderror
                </div>
                <div class="form-floating">
                    <input
                        type="password"
                        name="password_confirmation"
                        id="passwordConfirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="{{ __('users.confirm') }}"
                        required
                    />
                    <label for="passwordConfirmation" class="form-label required-field">{{ __('users.confirm') }}</label>
                    @error('password_confirmation') @include('elements.errorMessage') @enderror
                </div>
                <div class="text-center mt-3">
                    @include('elements.buttonLoading', [
                        'type'  => 'submit',
                        'class' => 'btn-light btn-light--success',
                        'text'  => 'auth.actions.register',
                    ])
                </div>
            </form>
        </div>
    </section>
@endsection
