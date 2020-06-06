@extends('layouts.frontsite')

@section('content')

<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    @foreach ($articles as $article)
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="{{ route('artikel.show', $article->slug) }}">
                                    <img src="{{ asset($article->cover) }}" width="100%" alt="">
                                </a>
                            </div>
                            <div class="post-data">
                                @forelse ($article->categories as $kategori)
                                    <a href="{{ route('kategori.show', $kategori->slug) }}" 
                                        class="custom-category">
                                        {{ $kategori->name }}
                                    </a>{{$loop->last ? '' : ','}}
                                @empty
                                    <a href="{{ route('tanpa.kategori') }}" 
                                        class="post-catagory">
                                        Tanpa Kategori
                                    </a>
                                @endforelse
                                <a href="{{ route('artikel.show', $article->slug) }}" class="post-title">
                                    <h6>{{ $article->title }}</h6>
                                </a>
                                <div class="post-meta">
                                    @if ($article->author)
                                        <p class="post-author">By <a href="{{ route('author.show', $article->author->username) }}">{{ $article->author->name }}</a></p>
                                    @endif
                                    <p class="post-excerp">
                                        {{(strlen(strip_tags($article->content)) > 300) ?
                                        substr(strip_tags($article->content), 0, 300).".." :
                                        strip_tags($article->content)}} 
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{ $articles->links() }}
            </div>

            <div class="col-12 col-lg-4">
                <div class="blog-sidebar-area">
                    @include('layouts.partial.frontsite.random_article')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection