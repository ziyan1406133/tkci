@extends('layouts.frontsite')

@section('content')

<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    @foreach ($galleries as $gallery)
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="{{ route('gallery.show', $gallery->slug) }}">
                                    <img src="{{ asset($gallery->cover) }}" width="100%" alt="">
                                </a>
                            </div>
                            <div class="post-data">
                                <a href="{{ route('gallery.show', $gallery->slug) }}" class="post-title">
                                    <h6>{{ $gallery->name }}</h6>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{ $galleries->links() }}
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