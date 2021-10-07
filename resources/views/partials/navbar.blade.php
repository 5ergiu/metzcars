<nav class="navigation navigation--fixed navigation--fixed-small navbar d-sm-none">
    <a class="px-2 px-sm-0" href="{{ route('app.home') }}">
        <img src="{{ asset('logo_small.png') }}" width="50px" alt="{{ config('app.name') }}" />
    </a>
    <div class="text-center">
        <p>{{ config('app.name') }}</p>
    </div>
    @auth
        <div class="dropdown dropdown--account">
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
    @include('elements.localeDropdown')
</nav>
<nav class="container-lg navigation navigation--fixed navigation--fixed-big navbar">
    <a class="d-none d-sm-block" href="{{ route('app.home') }}">
        <img class="d-none d-md-block" src="{{ asset('logo_h.png') }}" width="250px" alt="{{ config('app.name') }}"/>
        <img class="d-md-none" src="{{ asset('logo_small.png') }}" width="50px" alt="{{ config('app.name') }}" />
    </a>
    <ul class="navbar-nav flex-row flex-grow-1 justify-content-around justify-content-sm-center justify-content-md-start gap-sm-2 gap-xl-4 ms-md-5">
        <li>
            <a class="navigation__link d-flex flex-column align-items-center d-sm-block {{ request()->is('/') ? 'navigation__link--active' : null }}" aria-current="page" href="{{ route('app.home') }}">
                <i class="fas fa-home me-sm-1"></i>
                <span class="navbar__link_label">{{ __('labels.home') }}</span>
            </a>
        </li>
        <li>
            <a class="navigation__link d-flex flex-column align-items-center d-sm-block {{ request()->segment(1) === 'stock' ? 'navigation__link--active' : null }}" href="{{ route('app.stock.index') }}">
                <i class="fas fa-warehouse me-sm-1"></i>
                <span class="navbar__link_label">{{ __('labels.stock') }}</span>
            </a>
        </li>
        <li>
            <a class="navigation__link d-flex flex-column align-items-center d-sm-block {{ request()->segment(1) === 'portfolio' ? 'navigation__link--active' : null }}" href="{{ route('app.portfolio.index') }}">
                <i class="fas fa-briefcase me-sm-1"></i>
                <span class="navbar__link_label">{{ __('labels.portfolio') }}</span>
            </a>
        </li>
        <li>
            <a class="navigation__link d-flex flex-column align-items-center d-sm-block {{ request()->segment(1) === 'contact' ? 'navigation__link--active' : null }}" href="{{ route('app.contacts.create') }}">
                <i class="far fa-envelope me-sm-1"></i>
                <span class="navbar__link_label">{{ __('labels.contact') }}</span>
            </a>
        </li>
    </ul>
    @auth
        <div class="dropdown dropdown--account d-none d-sm-block">
            <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('static/guest.png') }}"  alt="" />
            </button>
            <ul class="dropdown-menu py-2">
                <li class="dropdown-item py-2 px-4">
                    <a class="d-block text-uppercase" href="{{ route('admin.contacts.index') }}">
                        {{ __('labels.contacts') }}
                    </a>
                </li>
                <li class="dropdown-item py-2 px-4">
                    <a class="d-block text-uppercase" href="{{ route('admin.portfolio.create') }}">
                        {{ __('labels.addToPortfolio') }}
                    </a>
                </li>
                <li class="dropdown-item text-center">
                    <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="button button--transparent button--transparent--success">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    @endauth
    <div class="d-none d-sm-block">
        @include('elements.localeDropdown')
    </div>
</nav>
