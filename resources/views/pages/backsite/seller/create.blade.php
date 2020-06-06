@extends('layouts.backsite')

@section('content')
<h4 class="mb-4">Tambah Seller</h4>
<form action="{{route('seller.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Seller" name="name" id="name" required>
            </div>
            <div class="form-group">
                <textarea name="description" id="description" class="form-control"
                rows="15" placeholder="Deskripsi Seller" required></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Kode Seller" name="code" id="code" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email Seller" name="email" id="email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="No. HP" name="phone" id="phone">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="zmdi zmdi-facebook"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username Facebook" name="facebook" id="facebook">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="zmdi zmdi-twitter"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username Twitter" name="twitter" id="twitter">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="zmdi zmdi-instagram"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username Instagram" name="instagram" id="instagram">
                </div>
                <small>Tulis username tanpa tanda '@'</small>
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