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
                                <h6>{{ $admin->name }}</h6>
                            </a>
                            <div class="post-meta">
                                <img class="pull-left" src="{{ asset($admin->image) }}" width="30%" alt="">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <table class="table table-borderless table-responsive">
                                            <tr>
                                                <td>E-Mail</td>
                                                <td>: {{ $admin->email }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <table class="table table-borderless table-responsive">
                                            <tr>
                                                <td>Username</td>
                                                <td>: {{ $admin->username }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-borderless table-responsive">
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td colspan="2">: {{ $admin->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Artikel</td>
                                                <td>: {{ count($admin->published_articles) }}</td>
                                                <td>
                                                    @if (count($admin->published_articles) > 0)
                                                        <a href="{{ route('authors.article', $admin->username) }}" 
                                                            class="btn btn-sm btn-info"> Lihat Artikel
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="p-2">
                                            <p>Bio :</p>
                                            <p>
                                                {{ $admin->bio }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {!! (($admin->facebook !== null) || ($admin->twitter !== null) || ($admin->instagram !== null)) ? '<hr>' : '' !!}
                                <div class="card-text text-sm-center">
                                    @if ($admin->facebook !== null)
                                        <a href="http://facebook.com/{{ $admin->facebook }}" 
                                            class="btn-lg btn-empty text-facebook" target="_blank">
                                        <span class="fa fa-facebook"></span>
                                        </a>
                                    @endif
                                    @if ($admin->twitter !== null)
                                        <a href="http://twitter.com/{{ $admin->twitter }}" 
                                            class="btn-lg btn-empty text-info" target="_blank">
                                        <span class="fa fa-twitter"></span>
                                        </a>
                                    @endif
                                    @if ($admin->instagram !== null)
                                        <a href="http://instagram.com/{{ $admin->instagram }}" 
                                            class="btn-lg btn-empty text-instagram" target="_blank">
                                        <span class="fa fa-instagram"></span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="blog-sidebar-area">
                    @auth
                        @if ((auth()->user()->id == $admin->id) || (auth()->user()->role == 'Super Admin'))
                            <div class="mb-5 text-center">
                                <a href="{{route('admin.edit', $admin->id)}}" class="btn btn-md btn-primary">
                                    Edit Akun
                                </a>
                                <a href="#" class="btn btn-md btn-info"
                                    data-toggle="modal" data-target="#deleteAdmin_{{$admin->id}}"
                                    >Hapus Akun
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
@include('pages.backsite.admin.modal.delete')
@endsection