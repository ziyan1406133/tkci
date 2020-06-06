@extends('layouts.backsite')

@section('content')
<h4 class="mb-4">Dashboard</h4>

<div class="row m-t-25">
    <div class="col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fa fa-code-branch"></i>
                    </div>
                    <div class="text mb-4">
                        <h2>{{ count($cabang) }}</h2>
                        <span>Cabang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fa fa-newspaper"></i>
                    </div>
                    <div class="text mb-4">
                        <h2>{{ count($artikel) }}</h2>
                        <span>Artikel Terpublikasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="overview-item overview-item--c4">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fa fa-money-bill-alt"></i>
                    </div>
                    <div class="text mb-4">
                        <h2>Rp. {{ number_format($total_donasi,0,",",".") }} </h2>
                        <span>Donasi Tahun Ini</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<p class="mb-4">Donasi Terbaru</p>
@if(count($donations) > 0)
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Donatur</th>
                    <th>Cabang Penerima</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($donations as $donation)
                    <tr>
                        <td>{{date_format(date_create($donation->date), 'Y M d')}}</td>
                        <td>{{$donation->donator}}</td>
                        <td> 
                            <a href="{{ route('cabang.show', $donation->branch->slug) }}">
                                {{$donation->branch->branch_name}}
                            </a>    
                        </td>
                        <td>Rp. {{number_format($donation->nominal,0,",",".")}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="text-muted">Belum ada donasi yang tercatat.</p>
@endif

<p class="mb-4">Artikel Terbaru</p>
<div class="card-columns">
    @forelse ($articles as $article)
        <div class="card">
            <img class="card-img-top" src="{{asset($article->cover)}}" alt="Cover Artikel">
            <div class="card-body">
            <h5 class="card-title">
                {{$article->title}}
            </h5>
            <p class="card-text">
                {{(strlen(strip_tags($article->content)) > 100) ?
                substr(strip_tags($article->content), 0, 100).".." :
                strip_tags($article->content)}}
            </p>
            <p class="card-text">
                <small class="text-muted">
                    {{date_format(date_create($article->date), 'd M Y')}}{!! ', 
                    oleh <a href="'.route('admin.show', $article->author->username).'">@'
                    .$article->author->username.'</a>' !!}
                </small>
            </p>
            <p class="card-text">
                @if (auth()->user()->id == $article->author_id)
                    <div class="pull-right">
                        <a class="btn btn-sm btn-empty" href="{{route('artikel.edit', $article->id)}}">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a class="btn btn-sm btn-empty" href="#"
                            data-toggle="modal" 
                            data-target="#deleteArticle_{{$article->id}}">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                    </div>
                    @include('pages.backsite.article.modal.delete')
                @endif
                <small class="text-muted">
                    @forelse ($article->categories as $category)
                        {{$category->name}} {{$loop->last ? '' : ','}}
                    @empty
                        Tanpa Kategori
                    @endforelse
                </small>
            </p>
            </div>
        </div>
    @empty
        <p class="text-muted">Tidak ada apapun disini, silahkan buat artikel.</p>
    @endforelse
</div>
@endsection
