<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            Financial Tracker
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}"
                       href="{{ route('pengelolaan') }}">
                        Pengelolaan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                       href="{{ route('profile') }}">
                        {{ session('username', 'Profile') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fw-bold"
                       href="{{ route('logout') }}"
                       onclick="return confirm('Yakin ingin logout?')">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
