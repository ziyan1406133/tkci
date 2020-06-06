
<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{asset('images/icon/logo.png')}}" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="{{route('homepage')}}">
                        <i class="fas fa-home"></i>Homepage
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i class="fas fa-table"></i>Dashboard
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-newspaper"></i>Artikel</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="{{route('my.drafts')}}">Draft</a>
                        </li>
                        <li>
                            <a href="{{route('my.articles')}}">Artikel Saya</a>
                        </li>
                        <li>
                            <a href="{{route('admin.artikel')}}">Semua Artikel</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('kategori.index')}}">
                        <i class="fas fa-tags"></i>Kategori Artikel
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.gallery') }}">
                        <i class="fas fa-images"></i>Galeri
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-code-branch"></i>Cabang TKCI</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="{{ route('admin.cabang') }}">Daftar Cabang</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.donation') }}">Info Donasi</a>
                        </li>
                        <li>
                            <a href="{{ route('peta.cabang.admin') }}">Sebaran Lokasi</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-shopping-bag"></i>Seller & Aksesoris</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="{{route('admin.seller')}}">Daftar Seller</a>
                        </li>
                        <li>
                            <a href="{{route('admin.aksesoris')}}">Daftar Aksesoris</a>
                        </li>
                    </ul>
                </li>
                @if (auth()->user()->role == 'Super Admin')
                    <li>
                        <a href="{{route('admin.index')}}">
                            <i class="fas fa-user"></i> Administrator
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->