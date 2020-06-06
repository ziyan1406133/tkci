@extends('layouts.frontsite')

@section('content')

<!-- ##### Featured Post Area Start ##### -->
<div class="featured-post-area">
    <div class="container">
        <div class="section-heading">
            <h6>Artikel Terbaru</h6>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="row">

                    <!-- Single Featured Post -->
                    <div class="col-12 col-lg-7">
                        <div class="single-blog-post featured-post">
                            <div class="post-thumb">
                                <a href="{{ route('artikel.show', $satu_artikel->slug) }}">
                                    <img src="{{ asset($satu_artikel->cover) }}" alt="">
                                </a>
                            </div>
                            <div class="post-data">
                                @forelse ($satu_artikel->categories as $kategori)
                                    <a href="{{ route('kategori.show', $kategori->slug) }}" 
                                        class="custom-category">
                                        {{ $kategori->name }}
                                    </a>{{$loop->last ? '' : ','}}
                                @empty
                                    <a href="{{ route('tanpa.kategori') }}" 
                                        class="custom-category">
                                        Tanpa Kategori
                                    </a>
                                @endforelse
                                <a href="{{ route('artikel.show', $satu_artikel->slug) }}" class="post-title">
                                    <h6>{{ $satu_artikel->title }}</h6>
                                </a>
                                <div class="post-meta">
                                    @if ($satu_artikel->author)
                                        <p class="post-author">By <a href="#">{{ $satu_artikel->author->name }}</a></p>
                                    @endif
                                    <p class="post-excerp">
                                        {{(strlen(strip_tags($satu_artikel->content)) > 300) ?
                                        substr(strip_tags($satu_artikel->content), 300).".." :
                                        strip_tags($satu_artikel->content)}} 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5">
                        <!-- Single Featured Post -->
                        @foreach ($dua_artikel as $artikel)
                            <div class="single-blog-post featured-post-2">
                                <div class="post-thumb">
                                    <a href="{{ route('artikel.show', $artikel->slug) }}">
                                        <img src="{{ asset($artikel->cover) }}" alt="">
                                    </a>
                                </div>
                                <div class="post-data">
                                    @forelse ($artikel->categories as $kategori)
                                        <a href="{{ route('kategori.show', $kategori->slug) }}" 
                                            class="custom-category">
                                            {{ $kategori->name }}
                                        </a>{{$loop->last ? '' : ','}}
                                    @empty
                                        <a href="{{ route('tanpa.kategori') }}" 
                                            class="custom-category">
                                            Tanpa Kategori
                                        </a>
                                    @endforelse
                                    <div class="post-meta">
                                        <a href="{{ route('artikel.show', $artikel->slug) }}" class="post-title">
                                            <h6>
                                                {{(strlen($artikel->title) > 100) ?
                                                substr($artikel->title, 100).".." :
                                                ($artikel->title)}} 
                                            </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <!-- Single Featured Post -->
                @foreach ($lima_artikel as $artikel)
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="{{ route('artikel.show', $artikel->slug) }}">
                                <img src="{{ asset($artikel->cover) }}" alt="">
                            </a>
                        </div>
                        <div class="post-data">
                            @forelse ($artikel->categories as $kategori)
                                <a href="{{ route('kategori.show', $kategori->slug) }}" 
                                    class="custom-category">
                                    {{ $kategori->name }}
                                </a>{{$loop->last ? '' : ','}}
                            @empty
                                <a href="{{ route('tanpa.kategori') }}" 
                                    class="custom-category">
                                    Tanpa Kategori
                                </a>
                            @endforelse
                            <div class="post-meta">
                                <a href="{{ route('artikel.show', $artikel->slug) }}" class="post-title">
                                    <h6>
                                        {{(strlen($artikel->title) > 100) ?
                                        substr($artikel->title, 100).".." :
                                        ($artikel->title)}} 
                                    </h6>
                                </a>
                                <p class="post-date">
                                    {{date_format(date_create($artikel->date), 'd M Y')}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="editors-pick-post-area section-padding-80-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="section-heading">
                    <h6>Artikel Lainnya</h6>
                </div>

                <div class="row">

                    @foreach ($random_artikel as $artikel)
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <a href="{{ route('artikel.show', $artikel->slug) }}">
                                    <img src="{{ asset($artikel->cover) }}" alt="">
                                </a>
                                <div class="post-data">
                                    @forelse ($artikel->categories as $kategori)
                                        <a href="{{ route('kategori.show', $kategori->slug) }}" 
                                            class="custom-category">
                                            {{ $kategori->name }}
                                        </a>{{$loop->last ? '' : ','}}
                                    @empty
                                        <a href="{{ route('tanpa.kategori') }}" 
                                            class="custom-category">
                                            Tanpa Kategori
                                        </a>
                                    @endforelse
                                    <a href="{{ route('artikel.show', $artikel->slug) }}" class="post-title">
                                        <h6>
                                            {{(strlen($artikel->title) > 100) ?
                                            substr($artikel->title, 100).".." :
                                            ($artikel->title)}} 
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="section-heading">
                    <h6>Merchandise</h6>
                </div>

                @forelse ($merchandise as $merch)
                    <!-- Single Post -->
                    <div class="single-blog-post style-2">
                        <div style=" background-image: url('{{$merch->image}}'); background-size: 100% auto;
                            width: 100%; height:150px;">
                        </div>
                        {{-- <div class="post-thumb">
                            <a href="{{ route('aksesoris.show', $merch->slug) }}">
                                <img src="{{ asset($merch->image) }}" alt="">
                            </a>
                        </div> --}}
                        <div class="post-data">
                            <a href="{{ route('aksesoris.show', $merch->slug) }}" class="post-title">
                                <h6>
                                    {{(strlen($merch->name) > 100) ?
                                    substr($merch->name, 100).".." :
                                    ($merch->name)}} 
                                </h6>
                            </a>
                            <div class="post-meta">
                                <div class="post-date">
                                    Rp. {{ number_format($merch->price,0,',','.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada merchandise yang tersedia</p>
                @endempty

            </div>
        </div>
    </div>
</div>

@endsection