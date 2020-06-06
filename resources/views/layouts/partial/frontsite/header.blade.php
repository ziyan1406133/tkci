
<header class="header-area" style="margin-bottom: 50px">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('homepage') }}"><img src="{{ asset('images/core-img/logo.png') }}" alt=""></a>
                        </div>

                        <!-- Login Search Area -->
                        <div class="login-search-area d-flex align-items-center">
                            <!-- Login -->
                            <div class="login d-flex">
                                <a href="{{ route('admin.dashboard') }}">Admin Area</a>
                            </div>
                            <!-- Search Form -->
                            <div class="search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" class="form-control" placeholder="Cari Artikel...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="newspaper-main-menu" id="stickyMenu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="newspaperNav">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('homepage') }}"><img src="{{ asset('images/core-img/logo.png') }}" alt=""></a>
                    </div>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="{{ route('homepage') }}">Home</a></li>
                                <li><a href="#">Kategori</a>
                                    <ul class="dropdown">
                                        @foreach ($daftar_kategori as $kategori)
                                            <li>
                                                <a href="{{ route('kategori.show', $kategori->slug) }}"
                                                    >{{ $kategori->name }}</a>
                                            </li>
                                        @endforeach
                                        <li><a href="#">Tanpa Kategori</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Cabang TKCI</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Sebaran Lokasi</a></li>
                                        @foreach ($daftar_cabang as $cabang)
                                            <li>
                                                <a href="{{ route('kategori.show', $cabang->slug) }}"
                                                    >{{ $cabang->branch_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">Semua Artikel</a></li>
                                <li><a href="#">Merchandise</a></li>
                                <li><a href="#">Pengumuman</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>