<nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
    <div class="container">
        <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="{{ url('/') }}">
            <span class="ms-md-1 mt-1 fw-bolder me-md-5">{{ __('layout.project-name') }}</span>
        </a>
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal">
            <li class="nav-item">
                <a class="nav-link fs-5" href="index.html" aria-label="Homepage">
                    {{ __('layout.home') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-5" href="content.html" aria-label="A sample content page">
                    {{ __('layout.application') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-5" href="system.html" aria-label="A system message page">
                    {{ __('layout.coffe') }}
                </a>
            </li>

        </ul>
        <a href="{{ route('home') }}" aria-label="Download this template" class="btn btn-outline-light">
            <small>{{ __('layout.login-button') }}</small>
        </a>
    </div>
</nav>
