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
                            <a href="#"><img class="pull-left" src="{{ asset($seller->image) }}" width="30%" alt=""></a>
                            <a href="#" class="post-title">
                                <h6>{{ $seller->name }}</h6>
                            </a>
                            <div class="post-meta">
                                <p class="post-author">Kode Seller : <a href="#">{{ $seller->code }}</a></p>
                                <p>
                                    {!! $seller->description !!}
                                </p>
                                <h6>
                                    Kontak Seller :
                                </h6>
                                <p>
                                    @if ($seller->email)
                                        E-Mail : {{ $seller->email }} <br>
                                    @endif
                                    @if ($seller->phone)
                                        No. Telp : {{ $seller->phone }} <br>
                                    @endif
                                    @if ($seller->facebook)
                                        Facebook : 
                                        <a href="http://facebook.com/{{ $seller->facebook }}" target="_blank">
                                            {{ '@'.$seller->facebook }} <br>
                                        </a>
                                    @endif
                                    @if ($seller->twitter)
                                        Twitter : 
                                        <a href="http://twitter.com/{{ $seller->twitter }}" target="_blank">
                                            {{ '@'.$seller->twitter }} <br>
                                        </a>
                                    @endif
                                    @if ($seller->instagram)
                                        Instagram : 
                                        <a href="http://instagram.com/{{ $seller->instagram }}" target="_blank">
                                            {{ '@'.$seller->instagram }} <br>
                                        </a>
                                    @endif
                                </p>
                                <h6>Merchandise :</h6>
                                <div class="card-columns">
                                    @forelse ($seller->accessories as $accessory)
                                        <div class="card">
                                            <a href="{{ route('aksesoris.show', $accessory->slug) }}">
                                                <img src="{{ asset($accessory->image) }}" alt="Gambar Merch">
                                            </a>
                                        </div>
                                    @empty
                                        Belum ada merchandise yang dijual.
                                    @endforelse
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
                            <a href="{{route('seller.edit', $seller->id)}}" class="btn btn-md btn-primary">
                                Edit Seller
                            </a>
                            <a href="#" class="btn btn-md btn-info"
                                data-toggle="modal" data-target="#deleteSeller_{{$seller->id}}"
                                >Hapus Seller
                            </a>
                        </div>
                    @endauth
                    
                    @include('layouts.partial.frontsite.random_article')

                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.backsite.seller.modal.delete')
@endsection