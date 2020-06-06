@extends('layouts.backsite')

@section('content')
<div class="mb-4">
    <div class="pull-right">
        <a href="#" data-toggle="modal" 
            data-target="#addDonation"
            class="btn btn-md btn-primary" 
            title="Tambah Donasi.">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <h4>Info Donasi</h4>
</div>

@if (count($donations) > 0)
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Donatur</th>
                    <th>Cabang Penerima</th>
                    <th>Nominal</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($donations as $donation)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{date_format(date_create($donation->date), 'Y M d')}}</td>
                        <td>{{$donation->donator}}</td>
                        <td> 
                            <a href="{{ route('cabang.show', $donation->branch->slug) }}">
                                {{$donation->branch->branch_name}}
                            </a>    
                        </td>
                        <td>Rp. {{number_format($donation->nominal,0,",",".")}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="#" data-toggle="modal" 
                                data-target="#editDonation_{{$donation->id}}"
                                title="Edit Donasi Ini.">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" 
                                data-target="#deleteDonation_{{$donation->id}}" 
                                href="#" title="Hapus Donasi Ini.">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($donations as $donation)
        @include('pages.backsite.donation.modal.edit')
        @include('pages.backsite.donation.modal.delete')
    @endforeach
@else
    <p class="text-muted">Belum ada donasi yang tercatat.</p>
@endif
@include('pages.backsite.donation.modal.add')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.table-data3').DataTable();
        } );
    </script>
@endsection