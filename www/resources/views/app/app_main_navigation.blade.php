<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('app.index') }}">
            <span class="align-middle">Fakturkowo</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Główne</li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('app.index') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Panel użytkownika</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('app.list') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Lista faktur</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('app.new') }}">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Nowa faktura</span>
                </a>
            </li>

            <li class="sidebar-header">Konto</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('app.profile') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profil firmy</span>
                </a>
            </li>

            <li class="sidebar-header">Inne</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('app.contactForm') }}">
                    <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Kontakt</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Postaw mi kawę</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
