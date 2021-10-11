@extends('main')

@section('title') {{ __('auth.actions.login') }} @endsection

@section('content')
    <section class="container mt-3">
        <h3 class="title text-center">
            {{ __('auth.actions.login') }}
        </h3>
        <div class="dark col-lg-5 mx-auto">
            <h3 class="text-center mb-4">{{ __('auth.welcomeBack') }} 👋</h3>
            <form class="needs-validation" action="{{ route('login') }}" method="POST">
                @csrf
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
                <div class="text-center mt-3">
                    @include('elements.buttonLoading', [
                        'type'  => 'submit',
                        'class' => 'btn-light btn-light--success',
                        'text'  => 'auth.actions.login',
                    ])
                </div>
            </form>
        </div>
    </section>
@endsection
