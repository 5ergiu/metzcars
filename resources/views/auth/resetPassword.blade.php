@extends('main')

@section('title') {{ __('auth.actions.login') }} @endsection

@section('content')
    <section class="container">
        <div class="dark col-lg-5 mx-auto">
            <h3 class="text-center mb-4">{{ __('auth.enterNewPassword') }}</h3>
            <form class="needs-validation" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}" />
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
                <div class="form-floating mb-4">
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
                        'text'  => 'auth.actions.reset',
                    ])
                </div>
            </form>
        </div>
    </section>
@endsection
