@extends('layouts.backsite')

@section('content')
<h4 class="mb-4">Tambah Aksesoris</h4>
<form action="{{route('aksesoris.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Aksesoris" name="name" id="name" required>
            </div>
            <div class="form-group">
                <textarea name="description" id="description" class="form-control"
                rows="15" placeholder="Deskripsi Aksesoris" required></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="seller_id" id="seller_id" class="form-control" required>
                    <option value="">-- Pilih Seller --</option>
                    @foreach ($sellers as $seller)
                        <option value="{{ $seller->id }}">({{ $seller->code }}) {{ $seller->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                    Rp.
                    </div>
                    <input type="number" class="form-control" placeholder="Harga" name="price" id="price" required>
                </div>
                <small>isi dengan angka saja tanpa tanda baca</small>
            </div>
            <div class="form-group">
                <label class="form-control-label">Gambar</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Deskripsi Seller',
                height: 350
            });
        });
    </script>
@endsection