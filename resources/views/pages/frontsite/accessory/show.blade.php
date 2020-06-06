@extends('layouts.frontsite')

@section('content')
<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">

                    <!-- Single Featured Post -->
                    <div class="single-blog-post featured-post single-post">
                        <div class="post-thumb">
                            <a href="#"><img src="{{ asset($accessory->image) }}" width="100%" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>{{ $accessory->name }}</h6>
                            </a>
                            <div class="post-meta">
                                <p class="post-author">Seller : <a href="{{ route('seller.show', $accessory->seller->slug) }}" >{{ $accessory->seller->name }}</a></p>
                                <p class="post-author">
                                    <a href="#">
                                        Rp. {{ number_format($accessory->price,0,',','.') }}
                                    </a>
                                </p>
                                <p>
                                    {!! $accessory->description !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- About Author -->
                    <div class="blog-post-author d-flex">
                        <div class="author-thumbnail">
                            <img src="{{ asset($accessory->seller->image) }}" alt="">
                        </div>
                        <div>
                            <a href="{{ route('seller.show', $accessory->seller->slug) }}" class="author-name">{{ $accessory->seller->name }}</a>
                            {!! (($accessory->seller->facebook !== null) || ($accessory->seller->twitter !== null) || ($accessory->seller->instagram !== null)) ? '<hr>' : '' !!}
                            <div class="card-text text-sm-center">
                                @if ($accessory->seller->facebook !== null)
                                    <a href="http://facebook.com/{{ $accessory->seller->facebook }}" 
                                        class="btn-lg btn-empty text-facebook" target="_blank">
                                    <span class="fa fa-facebook"></span>
                                    </a>
                                @endif
                                @if ($accessory->seller->twitter !== null)
                                    <a href="http://twitter.com/{{ $accessory->seller->twitter }}" 
                                        class="btn-lg btn-empty text-info" target="_blank">
                                    <span class="fa fa-twitter"></span>
                                    </a>
                                @endif
                                @if ($accessory->seller->instagram !== null)
                                    <a href="http://instagram.com/{{ $accessory->seller->instagram }}" 
                                        class="btn-lg btn-empty text-instagram" target="_blank">
                                    <span class="fa fa-instagram"></span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="blog-sidebar-area">
                    @auth
                        <div class="mb-5 text-center">
                            <a href="{{route('aksesoris.edit', $accessory->id)}}" class="btn btn-md btn-primary">
                                Edit Merchandise
                            </a>
                            <a href="#" class="btn btn-md btn-info"
                                data-toggle="modal" data-target="#deleteAccessory_{{$accessory->id}}"
                                >Hapus Merchandise
                            </a>
                        </div>
                    @endauth
                    
                    @include('layouts.partial.frontsite.random_article')

                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.backsite.accessory.modal.delete')
@endsection