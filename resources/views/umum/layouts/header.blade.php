<!-- Navigation -->
<nav class="navbar navbar-expand-lg" style="background-color: #202020;">
    <div class="container">
        <!-- Logo -->
        <a href="{{ route('umum.index') }}" class="navbar-brand">
            <img src="{{ asset('img/mb.png') }}" alt="Muria Batik Logo" class="logo-img" style="height: 50px; width: auto;">
        </a>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="color: #d9c24d;"></span>
        </button>
        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Centered Links -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('umum.index') ? 'active' : '' }} text-white me-3 btn btn-warning" href="{{ route('umum.index') }}">
                        <i class="bi bi-house"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('umum.produk') ? 'active' : '' }} text-white me-3 btn btn-warning" href="{{ route('umum.produk') }}">
                        <i class="bi bi-grid"></i> Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('umum.produknostok') ? 'active' : '' }} text-white me-3 btn btn-warning" href="{{ route('umum.produknostok') }}">
                        <i class="bi bi-grid"></i> Produk Pre Order
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('umum.transaksi') ? 'active' : '' }} text-white me-3 btn btn-warning" href="{{ route('umum.transaksi') }}">
                        <i class="bi bi-grid"></i> Transaksi
                    </a>
                </li>
            </ul>
            <!-- Right-aligned Links -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('keranjang.index') ? 'active' : '' }} text-white me-3 btn btn-warning" href="{{ route('keranjang.index') }}">
                        <i class="bi bi-cart"></i>
                        @if (Auth::guard('member')->check())
                            {{ $keranjangs->where('id_member', Auth::guard('member')->user()->id)->count() }}
                        @endif
                    </a>
                </li>
                @if (Auth::guard('member')->check())
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('member.profile.edit') ? 'active' : '' }} text-white me-3 btn btn-warning" href="{{ route('member.profile.edit') }}">
                            <i class="bi bi-person"></i> Akun
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('umum.logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin logout?');">
                            @csrf
                            <button type="submit" class="text-white me-3 btn btn-danger">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('umum.login') ? 'active' : '' }} text-white me-3 btn btn-warning" href="{{ route('umum.login') }}">
                            <i class="bi bi-grid"></i> Login
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
