@extends('layouts.backsite')

@section('content')
<div class="mb-4">
    <div class="pull-right">
        <a href="{{route('seller.create')}}" class="btn btn-md btn-primary" 
            title="Tambah Seller.">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <h4>Daftar Seller</h4>
</div>

@if (count($sellers) > 0)
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Seller</th>
                    <th>Kode Seller</th>
                    <th>Jumlah Aksesoris</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($sellers as $seller)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$seller->name}}</td>
                        <td>{{$seller->code}}</td>
                        <td>{{count($seller->accessories)}}</td>
                        <td>
                            <a class="btn btn-sm btn-info"  
                                href="#" title="Lihat Info Seller Ini.">
                                <i class="fa fa-info"></i>
                            </a>
                            <a class="btn btn-sm btn-warning"  
                                href="{{ route('seller.edit', $seller->id) }}" title="Edit Seller Ini.">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" 
                                data-target="#deleteSeller_{{$seller->id}}" 
                                href="#" title="Hapus Seller Ini.">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($sellers as $seller)
        @include('pages.backsite.seller.modal.delete')
    @endforeach
        
@else
    <p class="text-muted">Belum ada seller yang terdaftar.</p>
@endif
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.table-data3').DataTable();
        } );
    </script>
@endsection