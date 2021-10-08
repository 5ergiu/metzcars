<div class="dropdown-admin position-relative">
    <button type="button" class="btn btn-light me-sm-2" data-bs-toggle="dropdown" aria-expanded="false">
        Admin
        <i class="fas fa-chevron-up ms-1 d-sm-none"></i>
        <i class="fas fa-chevron-down align-middle ms-1 d-none d-sm-inline"></i>
    </button>
    <ul class="dropdown-menu p-3">
        <li class="dropdown-item p-0">
            <a class="d-block p-2" href="{{ route('contacts.index') }}">
                {{ __('labels.contacts') }}
            </a>
        </li>
        <li class="dropdown-item p-0">
            <a class="d-block p-2" href="{{ route('portfolio.create') }}">
                {{ __('labels.addToPortfolio') }}
            </a>
        </li>
        <li class="text-center mt-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light btn-light--danger">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>
