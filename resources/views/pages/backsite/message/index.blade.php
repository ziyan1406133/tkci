@extends('layouts.backsite')

@section('content')
    <h4 class="mb-4">Pesan dari Pengunjung</h4>
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($messages as $message)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$message->name ? $message->name : 'Anonim'}}</td>
                        <td>{{$message->email ? $message->email : 'Tidak Diisi'}}</td>
                        <td>{{$message->subject}}</td>
                        <td>
                            <a class="btn btn-sm btn-info"  data-toggle="modal" 
                                data-target="#showMessage_{{$message->id}}" 
                                href="#" title="Lihat Pesan">
                                <i class="fa fa-info"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" 
                                data-target="#deleteMessage_{{$message->id}}" 
                                href="#" title="Hapus Pesan">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($messages as $message)
        @include('pages.backsite.message.modal.show')
        @include('pages.backsite.message.modal.delete')
    @endforeach
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.table-data3').DataTable();
        } );
    </script>
@endsection