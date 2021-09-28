<nav class="navbar wrapper">
    <a class="navbar-brand d-none d-sm-block" href="{{ route('app.home') }}">
        <img class="d-none d-md-block navbar-brand--big" src="{{ asset('logo.png') }}"  alt="Metz Cars"/>
        <img class="d-md-none navbar-brand--small" src="{{ asset('logo_small.png') }}" alt="Metz Cars" />
    </a>
    <ul class="navbar-nav flex-row flex-grow-1 justify-content-around justify-content-sm-center justify-content-md-start">
        <li>
            <a class="navbar__link {{ request()->is('/') ? 'navbar__link--active' : null }}" aria-current="page" href="{{ route('app.home') }}">
                <i class="fas fa-home"></i>
                <span class="navbar__link_label">{{ __('labels.home') }}</span>
            </a>
        </li>
        <li>
            <a class="navbar__link {{ request()->segment(1) === 'stock' ? 'navbar__link--active' : null }}" href="{{ route('app.stock') }}">
                <i class="fas fa-warehouse"></i>
                <span class="navbar__link_label">{{ __('labels.stock') }}</span>
            </a>
        </li>
        <li>
            <a class="navbar__link {{ request()->segment(1) === 'portfolio' ? 'navbar__link--active' : null }}" href="{{ route('app.portfolio') }}">
                <i class="fas fa-briefcase"></i>
                <span class="navbar__link_label">{{ __('labels.portfolio') }}</span>
            </a>
        </li>
        <li>
            <a
                class="navbar__link {{ request()->segment(1) === 'contact' ? 'navbar__link--active' : null }}"
                href="{{ auth()->user() ? route('admin.contacts.index') : route('app.contacts.create') }}"
            >
                <i class="far fa-envelope"></i>
                <span class="navbar__link_label">{{ __('labels.contact') }}</span>
            </a>
        </li>
    </ul>
    @auth
        <div class="dropdown dropdown--account d-none d-sm-block">
            <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('static/guest.png') }}"  alt="" />
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="button button--transparent button--transparent--success">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    @endauth
    <div class="dropdown dropdown--locale d-none d-sm-block">
        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('static/locales/' . app()->getLocale() . '.png') }}"  alt="" />
        </button>
        <ul class="dropdown-menu">
            @foreach(LocaleService::$locales as $code => $name)
                @if($code !== app()->getLocale())
                    <li class="dropdown-item">
                        <a href="{{ route('app.locale', $code) }}">
                            <img src="{{ asset('static/locales/' . $code . '.png') }}"  alt="{{ $code }}" />
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
