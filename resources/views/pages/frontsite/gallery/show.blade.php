@extends('layouts.frontsite')

@section('content')
<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">

                    <!-- Single Featured Post -->
                    <div class="single-blog-post featured-post single-post">
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>{{ $gallery->name }}</h6>
                            </a>
                            <div class="post-meta">
                                <div class="card-columns">
                                    <div class="card">
                                        <a href="{{ asset($gallery->cover) }}" >
                                            <img src="{{ asset($gallery->cover) }}" alt="Gambar Cover">
                                        </a>
                                    </div>
                                    @foreach ($gallery->images as $image)
                                        <div class="card">
                                            <a href="{{ asset($image->image) }}" >
                                                <img href="{{ asset($image->image) }}" src="{{ asset($image->image) }}" alt="Gambar Cover">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="blog-sidebar-area">
                    @auth
                        <div class="mb-5 text-center">
                            <a href="{{route('admin.show.gallery', $gallery->slug)}}" class="btn btn-md btn-primary">
                                Lihat di Admin Area
                            </a>
                        </div>
                    @endauth
                    
                    @include('layouts.partial.frontsite.random_article')

                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.backsite.gallery.modal.delete')
@endsection