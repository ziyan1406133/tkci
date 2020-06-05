@extends('layouts.backsite')

@section('content')
<div class="mb-4">
    <div class="pull-right">
        <a href="{{route('aksesoris.create')}}" class="btn btn-md btn-primary" 
            title="Tambah Aksesoris.">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <h4>Daftar Aksesoris</h4>
</div>

@if (count($accessories) > 0)
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Aksesoris</th>
                    <th>Harga</th>
                    <th>Seller</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($accessories as $accessory)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$accessory->name}}</td>
                        <td>Rp. {{number_format($accessory->price,0,",",".")}}</td>
                        <td>{{$accessory->seller->name}}</td>
                        <td>
                            <a class="btn btn-sm btn-info"  
                                href="#" title="Lihat Info Aksesoris Ini.">
                                <i class="fa fa-info"></i>
                            </a>
                            <a class="btn btn-sm btn-warning"  
                                href="{{ route('aksesoris.edit', $accessory->id) }}" title="Edit Aksesoris Ini.">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" 
                                data-target="#deleteAccessory_{{$accessory->id}}" 
                                href="#" title="Hapus Aksesoris Ini.">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($accessories as $accessory)
        @include('pages.backsite.accessory.modal.delete')
    @endforeach
        
@else
    <p class="text-muted">Belum ada accessory yang terdaftar.</p>
@endif
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.table-data3').DataTable();
        } );
    </script>
@endsection