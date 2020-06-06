@extends('layouts.frontsite')

@section('content')

<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    @foreach ($accessories as $acc)
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="{{ route('aksesoris.show', $acc->slug) }}">
                                    <img src="{{ asset($acc->image) }}" width="100%" alt="">
                                </a>
                            </div>
                            <div class="post-data">
                                    <a href="#" class="post-catagory">
                                        Rp. {{ number_format($acc->price) }}
                                    </a>
                                <a href="{{ route('aksesoris.show', $acc->slug) }}" class="post-title">
                                    <h6>{{ $acc->name }}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">Seller : <a href="{{ route('seller.show', $acc->seller->slug) }}" >{{ $acc->seller->name }}</a></p>
                                    <p class="post-excerp">
                                        {{(strlen(strip_tags($acc->description)) > 300) ?
                                        substr(strip_tags($acc->description), 0, 300).".." :
                                        strip_tags($acc->description)}} 
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{ $accessories->links() }}
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