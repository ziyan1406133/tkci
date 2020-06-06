@extends('layouts.backsite')

@section('content')
<div class="mb-4">
    @if ($page !== 'Hasil Pencarian')
        <div class="pull-right">
            <a href="{{route('artikel.create')}}" class="btn btn-md btn-primary" 
                title="Buat Artikel Baru.">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    @endif
    <h4>{!! $page !!}</h4>
</div>
<div class="card-columns">
    @forelse ($articles as $article)
        <div class="card">
            <img class="card-img-top" src="{{asset($article->cover)}}" alt="Cover Artikel">
            <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('artikel.show', $article->slug) }}">
                    {{$article->title}}
                </a>
            </h5>
            <p class="card-text">
                {{(strlen(strip_tags($article->content)) > 100) ?
                substr(strip_tags($article->content), 100).".." :
                strip_tags($article->content)}}
            </p>
            <p class="card-text">
                <small class="text-muted">
                    {{date_format(date_create($article->date), 'd M Y')}}{!! ($page == 'Semua Artikel') || ($page == 'Hasil Pencarian') ? ', 
                    oleh <a href="'.route('admin.show', $article->author->username).'">@'
                    .$article->author->username.'</a>' : ''!!}
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
        @if ($page !== 'Hasil Pencarian')
            <p class="text-muted">Tidak ada apapun disini, silahkan buat artikel.</p>
        @else
            <p class="text-muted">Pencarian tidak ditemukan.</p>
        @endif
    @endforelse
</div>
<div class="pull-right">
    {{$articles->links()}}
</div>
@endsection