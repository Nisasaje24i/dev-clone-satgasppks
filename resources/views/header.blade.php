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
                <marquee width="60%" direction="left" height="30px" style="color: black; font-weight: bold;">Selamat Datang <font color="red"><b>{!! Session::get('nama_lengkap'); !!}</b></font>
                </marquee>
                <li><a class="nav-link scrollto {{ $isActive('dashboard') }}" href="/dashboard">Beranda</a></li>
                <li><a class="nav-link scrollto {{ $isActive('profil') }}" href="/profil">Profil</a></li>
                <li><a class="nav-link scrollto {{ $isActive('artikel') }}" href="/artikel">Artikel</a></li>
                <li><a class="nav-link scrollto {{ $isActive('program') }}" href="/program">Program</a></li>
                <li><a class="nav-link scrollto {{ $isActive('riwayat_laporan') }}" href="/riwayat_laporan">Riwayat Laporan</a></li>
                <li><a class="nav-link scrollto" style="color: red;" href="#" onclick="checkLogin()">Laporkan!</a></li>
                <li><a class="nav-link scrollto" href="{{ route('logout') }}">Logout</a></li>
                @else
                <li><a class="nav-link scrollto {{ $isActive('dashboard') }}" href="/dashboard">Beranda</a></li>
                <li><a class="nav-link scrollto {{ $isActive('profil') }}" href="/profil">Profil</a></li>
                <li><a class="nav-link scrollto {{ $isActive('artikel') }}" href="/artikel">Artikel</a></li>
                <li><a class="nav-link scrollto {{ $isActive('program') }}" href="/program">Program</a></li>
                <li><a class="nav-link scrollto" style="color: red;" href="#" onclick="showAlert()">Laporkan!</a></li>
                <li><a class="nav-link scrollto" href="/login">Masuk</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>

<script>
    function checkLogin() {
        var loggedIn = "{{ session('id_login') }}";

        if (loggedIn) {
            // Jika pengguna sudah login, langsung redirect ke halaman "laporkan"
            window.location.href = "/laporkan";
        } else {
            // Jika pengguna belum login, tampilkan alert dan redirect ke halaman login
            showAlert();
        }
    }

    function showAlert() {
        var result = confirm("Anda harus login terlebih dahulu untuk melaporkan.");
        if (result) {
            // ke halaman login
            window.location.href = "/login";
        }
    }

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