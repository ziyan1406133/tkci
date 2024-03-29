@extends('layouts.backsite')

@section('content')
    <h4 class="mb-4">Tambah Akun Admin</h4>
    <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Nama Lengkap" class="form-control" required>
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
                    <textarea name="bio" id="bio" class="form-control" placeholder="Bio"
                    rows="6" maxlength="255"></textarea>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Email Admin" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" minlength="8" placeholder="Password" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password1" id="password1" minlength="8" placeholder="Konfirmasi Password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Foto Profil</label>
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
        $(function() {
            $('#username').on('keypress', function(e) {
                if (e.which == 32){
                    // console.log('No SPACE');
                    return false;
                }
            });
        });
    </script>
@endsection