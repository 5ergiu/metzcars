<div class="wrapper navbar--wrapper">
    <nav class="navbar">
        <a class="navbar-brand d-none d-sm-block" href="{{ route('app.home') }}">
            <img class="d-none d-md-block navbar-brand--big" src="{{ asset('logo.png') }}"  alt="Metz Cars"/>
            <img class="d-md-none navbar-brand--small" src="{{ asset('logo_small.png') }}" alt="Metz Cars" />
        </a>
        <ul class="navbar-nav flex-row flex-grow-1 justify-content-around justify-content-sm-center justify-content-md-start">
            <li class="p-1">
                <a class="navbar__link {{ request()->is('/') ? 'navbar__link--active' : null }}" aria-current="page" href="{{ route('app.home') }}">
                    <i class="fas fa-home"></i>
                    <span class="navbar__link_label">{{ __('labels.home') }}</span>
                </a>
            </li>
            <li class="p-1">
                <a class="navbar__link {{ request()->segment(1) === 'stock' ? 'navbar__link--active' : null }}" href="{{ route('app.stock') }}">
                    <i class="fas fa-warehouse"></i>
                    <span class="navbar__link_label">{{ __('labels.stock') }}</span>
                </a>
            </li>
            <li class="p-1">
                <a class="navbar__link" href="#">
                    <i class="fas fa-briefcase"></i>
                    <span class="navbar__link_label">{{ __('labels.portfolio') }}</span>
                </a>
            </li>
            <li class="p-1">
                <a class="navbar__link" href="#">
                    <i class="far fa-envelope"></i>
                    <span class="navbar__link_label">{{ __('labels.contact') }}</span>
                </a>
            </li>
        </ul>
        <div class="dropdown dropdown--locale d-none d-sm-block">
            <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('static/locales/' . app()->getLocale() . '.png') }}"  alt="" />
            </button>
            <ul class="dropdown-menu">
                @foreach(LocaleService::$locales as $code => $name)
                    @if($code !== app()->getLocale())
                        <div class="dropdown-item">
                            <a href="{{ route('app.locale', $code) }}">
                                <img src="{{ asset('static/locales/' . $code . '.png') }}"  alt="{{ $code }}" />
                            </a>
                        </div>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>
</div>

