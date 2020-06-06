@extends('layouts.backsite')

@section('content')
    <div class="mb-4">
        <div class="pull-right">
            <a href="{{ route('gallery.show', $gallery->slug) }}" 
                class="btn btn-md btn-info" 
                title="Lihat di Frontsite">
                <i class="fa fa-info"></i>
            </a>
            <a href="#" class="btn btn-md btn-primary" 
                data-toggle="modal" 
                data-target="#addImage" 
                title="Tambah Gambar">
                <i class="fa fa-plus"></i>
            </a>
            <a href="#" data-toggle="modal" 
                data-target="#editGallery_{{ $gallery->id }}"
                class="btn btn-md btn-warning" 
                title="Edit Gallery.">
                <i class="fa fa-pencil-alt"></i>
            </a>
            <a href="#" data-toggle="modal" 
                data-target="#deleteGallery_{{ $gallery->id }}"
                class="btn btn-md btn-danger" 
                title="Hapus Gallery.">
                <i class="fa fa-trash"></i>
            </a>
        </div>
        <h4>{{ $gallery->name }}</h4>
    </div>
    <div class="card-columns">
        <div class="card">
            <img src="{{ asset($gallery->cover) }}" alt="Gambar Cover">
        </div>
        @foreach ($gallery->images as $image)
            <div class="card">
                <img class="card-img-top" src="{{ asset($image->image) }}" alt="Gambar Cover">
                <div class="card-body">
                    <p class="card-text">
                        @if ((auth()->user()->id == $image->gallery->author_id) || (auth()->user()->role == 'Super Admin'))
                            <div class="pull-right">
                                <a class="btn btn-sm btn-empty" href="#"
                                    data-toggle="modal" 
                                    data-target="#deleteImage_{{$image->id}}">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </div>
                        @endif
                    </p>
                </div>
            </div>
            @include('pages.backsite.gallery.modal.deleteImage')
        @endforeach
    </div>
    @include('pages.backsite.gallery.modal.addImage')
    @include('pages.backsite.gallery.modal.edit')
    @include('pages.backsite.gallery.modal.delete')

@endsection

@section('js')
    <script>
        $("#submit_images").click(function(){ 
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
    </script>
@endsection