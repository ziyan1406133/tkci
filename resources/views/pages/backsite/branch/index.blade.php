@extends('layouts.backsite')

@section('content')
<div class="mb-4">
    <div class="pull-right">
        <a href="{{ route('cabang.create') }}" 
            class="btn btn-md btn-primary" 
            title="Tambah Cabang.">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <h4>Daftar Cabang</h4>
</div>

@if (count($branches) > 0)
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Cabang</th>
                    <th>Ketua Cabang</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($branches as $branch)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$branch->branch_name}}</td>
                        <td>{{$branch->chairman_name}}</td>
                        <td>
                            Kec. {{ $branch->kecamatan->nama }},
                            {{ $branch->kabupaten->nama }},
                            {{ $branch->provinsi->nama }}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-info"  
                                href="{{ route('admin.show.cabang', $branch->slug) }}" title="Lihat Info Cabang Ini.">
                                <i class="fa fa-info"></i>
                            </a>
                            <a class="btn btn-sm btn-warning" href="{{ route('cabang.edit', $branch->id) }}"
                                title="Edit Seller Ini.">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" 
                                data-target="#deleteBranch_{{$branch->id}}" 
                                href="#" title="Hapus Cabang Ini.">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($branches as $branch)
        @include('pages.backsite.branch.modal.delete')
    @endforeach
@else
    <p class="text-muted">Belum ada cabang yang dibuat.</p>
@endif
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.table-data3').DataTable();
        } );
    </script>
@endsection