
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
                    <a href="#">
                        <i class="fas fa-images"></i>Galeri
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-code-branch"></i>Cabang TKCI</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="#">Daftar Cabang</a>
                        </li>
                        <li>
                            <a href="#">Info Donasi</a>
                        </li>
                        <li>
                            <a href="#">Sebaran Lokasi</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-shopping-bag"></i>Seller & Aksesoris</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="#">Daftar Seller</a>
                        </li>
                        <li>
                            <a href="#">Daftar Aksesoris</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-user"></i>{{auth()->user()->name}}</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="index2.html">Profil Saya</a>
                        </li>
                        <li>
                            <a href="index.html">Artikel Saya</a>
                        </li>
                        <li>
                            <a href="index2.html">Buat Artikel Baru</a>
                        </li>
                        <li>
                            <a href="index2.html">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->