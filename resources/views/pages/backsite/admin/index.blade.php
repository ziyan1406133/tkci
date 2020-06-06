@extends('layouts.backsite')

@section('content')
    <div class="mb-4">
        <div class="pull-right">
            <a href="{{ route('admin.create') }}" class="btn btn-md btn-primary" 
                title="Tambah Administrator.">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <h4>Daftar Administrator</h4>
    </div>
    
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3 table-data3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>Jumlah Artikel</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{count($admin->published_articles)}}</td>
                        <td>
                            <a class="btn btn-sm btn-info"
                                href="{{ route('admin.show', $admin->username) }}" title="Lihat Profil.">
                                <i class="fa fa-info"></i>
                            </a>
                            <a class="btn btn-sm btn-warning"  
                                href="{{ route('admin.edit', $admin->id) }}" title="Edit Profil.">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            @if ($admin->role !== 'Super Admin')
                                <a class="btn btn-sm btn-danger" data-toggle="modal" 
                                    data-target="#deleteAdmin_{{$admin->id}}" 
                                    href="#" title="Hapus Akun Admin.">
                                    <i class="fa fa-trash"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($admins as $admin)
        @include('pages.backsite.admin.modal.delete')
    @endforeach
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.table-data3').DataTable();
        } );
    </script>
@endsection