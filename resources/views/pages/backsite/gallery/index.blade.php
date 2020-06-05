@extends('layouts.backsite')

@section('content')
<div class="mb-4">
    <div class="pull-right">
        <a href="#" data-toggle="modal" 
            data-target="#addGallery"
            class="btn btn-md btn-primary" 
            title="Tambah Gallery.">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <h4>Daftar Galeri</h4>
</div>

@if (count($galleries) > 0)
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Galeri</th>
                    <th>Jumlah Aksesoris</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($galleries as $gallery)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$gallery->name}}</td>
                        <td>{{count($gallery->images) + 1}}</td>
                        <td>
                            <a class="btn btn-sm btn-info"  
                                href="{{ route('admin.show.gallery', $gallery->slug) }}" title="Lihat Info Seller Ini.">
                                <i class="fa fa-info"></i>
                            </a>
                            <a class="btn btn-sm btn-warning" href="#" data-toggle="modal" 
                                data-target="#editGallery_{{$gallery->id}}"
                                title="Edit Seller Ini.">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" 
                                data-target="#deleteGallery_{{$gallery->id}}" 
                                href="#" title="Hapus Seller Ini.">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($galleries as $gallery)
        @include('pages.backsite.gallery.modal.edit')
        @include('pages.backsite.gallery.modal.delete')
    @endforeach
@else
    <p class="text-muted">Belum ada gallery yang dibuat.</p>
@endif
@include('pages.backsite.gallery.modal.add')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.table-data3').DataTable();
        } );
    </script>
@endsection