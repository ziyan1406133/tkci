
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
                                <form action="{{ route('search.article') }}" method="get">
                                    @csrf
                                    <input type="text" name="keyword" class="form-control" placeholder="Cari Artikel...">
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
                                        <li><a href="{{ route('tanpa.kategori') }}">Tanpa Kategori</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('artikel.index') }}">Semua Artikel</a></li>
                                <li><a href="{{ route('peta.cabang') }}">Peta Cabang</a></li>
                                <li><a href="{{ route('aksesoris.index') }}">Merchandise</a></li>
                                <li><a href="{{ route('gallery.index') }}">Galeri</a></li>
                                <li><a href="{{ route('kategori.show', 'pengumuman') }}">Pengumuman</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>