@extends('layouts.frontsite')

@section('content')
<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">

                    <!-- Single Featured Post -->
                    <div class="single-blog-post featured-post single-post">
                        @if ($article->cover !== 'images/article/no_cover.png')
                            <div class="post-thumb">
                                <a href="#"><img src="{{ asset($article->cover) }}" width="100%" alt=""></a>
                            </div>
                        @endif
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>{{ $article->title }}</h6>
                            </a>
                            <div class="post-meta">
                                @if ($article->author)
                                    <p class="post-author">By <a href="{{ route('author.show', $article->author->username) }}">{{ $article->author->name }}</a></p>
                                @endif
                                <p>
                                    {!! $article->content !!}
                                </p>
                                <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                    <!-- Tags -->
                                    <div class="newspaper-tags d-flex">
                                        <span>Kategori :</span>
                                        <ul class="d-flex">
                                            @forelse ($article->categories as $kategori)
                                                <li>
                                                    <a href="{{ route('kategori.show', $kategori->slug) }}"> 
                                                        {{ $kategori->name }}{{$loop->last ? '' : ','}}
                                                    </a>
                                                </li>
                                            @empty
                                                <li>
                                                    <a href="{{ route('tanpa.kategori') }}"> 
                                                        Tanpa Kategori
                                                    </a>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($article->author)
                        <!-- About Author -->
                        <div class="blog-post-author d-flex">
                            <div class="author-thumbnail">
                                <img src="{{ asset($article->author->image) }}" alt="">
                            </div>
                            <div class="author-info">
                                <a href="{{ route('author.show', $article->author->username) }}" class="author-name">{{ $article->author->name }}</a>
                                <p>
                                    {{ $article->author->bio ? $article->author->bio : 'Tidak ada bio.' }}
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="blog-post-author d-flex">
                            <div class="author-thumbnail">
                                <img src="{{ asset('images/user/no_avatar.png') }}" alt="">
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">Akun Telah Dihapus</a>
                                <p>
                                    Tidak ada bio.
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="blog-sidebar-area">
                    @auth
                        @if ((auth()->user()->id == $article->author_id) || (auth()->user()->role == 'Super Admin'))
                            <div class="mb-5 text-center">
                                <a href="{{route('artikel.edit', $article->id)}}" class="btn btn-md btn-primary">
                                    Edit Artikel
                                </a>
                                <a href="#" class="btn btn-md btn-info"
                                    data-toggle="modal" data-target="#deleteArticle_{{$article->id}}"
                                    >Hapus Artikel
                                </a>
                            </div>
                        @endif
                    @endauth
                    
                    @include('layouts.partial.frontsite.random_article')

                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.backsite.article.modal.delete')
@endsection