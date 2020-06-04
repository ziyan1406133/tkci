
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-newspaper"></i>Artikel</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="#">Draft</a>
                        </li>
                        <li>
                            <a href="#">Artikel Saya</a>
                        </li>
                        <li>
                            <a href="#">Semua Artikel</a>
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="#">Daftar Seller</a>
                        </li>
                        <li>
                            <a href="#">Daftar Aksesoris</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->