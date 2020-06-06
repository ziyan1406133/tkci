
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('homepage')}}">
            <img src="{{asset('images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('admin.seller')}}">Daftar Seller</a>
                        </li>
                        <li>
                            <a href="{{route('admin.aksesoris')}}">Daftar Aksesoris</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('message.index')}}">
                        <i class="fas fa-comments"></i> Pesan Pengunjung
                    </a>
                </li>
                @if (auth()->user()->role == 'Super Admin')
                    <li>
                        <a href="{{route('admin.index')}}">
                            <i class="fas fa-user"></i> Administrator
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->