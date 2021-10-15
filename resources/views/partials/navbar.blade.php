<nav class="navigation navigation--fixed navigation--fixed-small navbar d-sm-none">
    <a class="px-2 px-sm-0" href="{{ route('home') }}">
        <img src="{{ asset('logo_small.png') }}" width="50px" alt="{{ config('app.name') }}" />
    </a>
    <div class="text-center">
        <p>{{ config('app.name') }}</p>
    </div>
    @include('elements.localeDd')
</nav>
<nav class="container-lg navigation navigation--fixed navigation--fixed-big navbar">
    <a class="d-none d-sm-block" href="{{ route('home') }}">
        <img class="d-none d-lg-block" src="{{ asset('logo_h.png') }}" width="250px" alt="{{ config('app.name') }}"/>
        <img class="d-lg-none" src="{{ asset('logo_small.png') }}" width="50px" alt="{{ config('app.name') }}" />
    </a>
    <ul class="flex-grow-1 d-flex list-unstyled mb-0 justify-content-around justify-content-sm-center justify-content-md-start align-items-center flex-row gap-sm-2 gap-xl-4 ms-md-5">
        <li>
            <a class="navigation__link d-flex flex-column align-items-center d-sm-block {{ request()->is('/') ? 'navigation__link--active' : null }}" aria-current="page" href="{{ route('home') }}">
                <i class="fas fa-home me-sm-1"></i>
                <span class="navbar__link_label">{{ __('labels.home') }}</span>
            </a>
        </li>
        <li>
            <a class="navigation__link d-flex flex-column align-items-center d-sm-block {{ request()->segment(1) === 'stock' ? 'navigation__link--active' : null }}" href="{{ route('stock.index') }}">
                <i class="fas fa-warehouse me-sm-1"></i>
                <span class="navbar__link_label">{{ __('labels.stock') }}</span>
            </a>
        </li>
        <li>
            <a class="navigation__link d-flex flex-column align-items-center d-sm-block {{ request()->segment(1) === 'portfolio' ? 'navigation__link--active' : null }}" href="{{ route('portfolio.index') }}">
                <i class="fas fa-briefcase me-sm-1"></i>
                <span class="navbar__link_label">{{ __('labels.portfolio') }}</span>
            </a>
        </li>
        <li>
        @auth
            @include('elements.adminDd')
        @else
            <a class="navigation__link d-flex flex-column align-items-center d-sm-block {{ request()->segment(1) === 'contact' ? 'navigation__link--active' : null }}" href="{{ route('contacts.create') }}">
                <i class="far fa-envelope me-sm-1"></i>
                <span class="navbar__link_label">{{ __('labels.contact') }}</span>
            </a>
        @endauth
        </li>
    </ul>
    <div class="d-none d-sm-block ms-sm-2">
        @include('elements.localeDd')
    </div>
</nav>
