@extends('layouts.backsite')

@section('content')
    <div class="mb-4">
        <div class="pull-right">
            <a href="#" class="btn btn-md btn-primary" 
                data-toggle="modal" 
                data-target="#addCategory" 
                title="Tambah Kategori.">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <h4>Kategori Artikel</h4>
    </div>
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Artikel</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{count($category->articles)}}</td>
                        <td>
                            <a class="btn btn-sm btn-info"  
                                href="#" title="Lihat Artikel di Kategori Ini.">
                                <i class="fa fa-info"></i>
                            </a>
                            <a class="btn btn-sm btn-warning"  
                                href="#" data-toggle="modal" 
                                data-target="#editCategory_{{$category->id}}" 
                                title="Edit Kategori Ini.">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" 
                                data-target="#deleteCategory_{{$category->id}}" 
                                href="#" title="Hapus Kategori Ini.">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($categories as $category)
        @include('pages.backsite.category.modal.edit')
        @include('pages.backsite.category.modal.delete')
    @endforeach
    @include('pages.backsite.category.modal.add')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.table-data3').DataTable();
        } );
    </script>
@endsection