<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <div class="logo me-auto">
            <img src="assets/img/satgas.png" alt="" width="50px" style="margin-right: 10px;">SATGAS PPKS
        </div>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                @php
                $currentPath = Request::path();
                $isActive = function ($path) use ($currentPath) {
                return $currentPath === $path ? 'active' : '';
                };
                @endphp
                @if(session('id_login'))
                <li><a class="nav-link scrollto {{ $isActive('dashboard_admin') }}" href="/dashboard_admin">Beranda</a></li>
                <li><a class="nav-link scrollto {{ $isActive('profile') }}" href="/profile">AKUN</a></li>
                <li><a class="nav-link scrollto {{ $isActive('logout') }}" href="{{ route('logout') }}">LOGOUT</a></li>
                @else
                <li><a class="nav-link scrollto {{ $isActive('dashboard') }}" href="/dashboard">Beranda</a></li>
                <li><a class="nav-link scrollto {{ $isActive('profil') }}" href="/profil">Profil</a></li>
                <li><a class="nav-link scrollto" style="color: red;" href="#" onclick="showAlert()">Laporkan!</a></li>
                <li><a class="nav-link scrollto" href="/login">Masuk</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>

<script>
    // JavaScript untuk menandai tautan navigasi yang aktif
    document.addEventListener("DOMContentLoaded", function() {
        var currentPath = "{{ Request::path() }}";
        var navLinks = document.querySelectorAll("#navbar ul li a");

        navLinks.forEach(function(link) {
            if (link.getAttribute("href") === "/" + currentPath) {
                link.classList.add("active");
            }
        });
    });
</script>

<style>
    .nav-link.active {
        color: blue;
    }
</style>