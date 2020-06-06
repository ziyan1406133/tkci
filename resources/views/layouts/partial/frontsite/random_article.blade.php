
<!-- Latest Posts Widget -->
<div class="latest-posts-widget mb-50">

    @foreach ($random_artikel as $artikel)
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