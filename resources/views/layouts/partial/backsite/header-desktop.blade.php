
<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header">
                    {{-- empty space --}}
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-comment-more"></i>
                            <span class="quantity">{{$count_drafts}}</span>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>You have {{$count_drafts}} Drafts. 
                                        <a href="{{route('my.drafts')}}" class="text-mute small">lihat semua</a>
                                    </p>
                                </div>
                                @foreach ($limit_drafts as $draft)
                                    <div class="notifi__item">
                                        <div class="bg-c1 img-cir img-40">
                                            <i class="fa fa-newspaper"></i>
                                        </div>
                                        <div class="content">
                                            <p>{{$draft->title}}</p>
                                            <span class="date">
                                                @forelse ($draft->categories as $category)
                                                    {{$category->name}} {{$loop->last ? '' : ','}}
                                                @empty
                                                    Uncategorized
                                                @endforelse
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="notifi__footer">
                                    <a href="{{route('artikel.create')}}">Buat Artikel Baru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{asset(auth()->user()->image)}}" alt="Profile Picture" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{auth()->user()->name}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Profil Saya</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{route('my.articles')}}">
                                            <i class="zmdi zmdi-file-text"></i>Artikel Saya</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="#">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->