@extends('layouts.backsite')

@section('content')
<h4 class="mb-4">Buat Artikel</h4>
<form action="{{route('artikel.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Judul Artikel" name="title" required>
            </div>
            <textarea name="content" id="content" placeholder="Isi Konten Artikel" class="form-control" rows="20" required></textarea>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-sm btn-primary pull-right">Simpan</button>
            <div class="form-group">
                <input type="checkbox" class="form-control-check" name="draft"> Simpan sebagai draft
            </div>
            <div class="card">
                <div class="card-header">
                    Gambar Cover
                </div>
                <div class="card-body">
                    <input type="file" name="cover" class="form-control-file">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Kategori Artikel
                </div>
                <div class="card-body">
                    @foreach ($categories as $category)
                    <input type="checkbox" class="form-control-check" 
                        name="categories[]" value="{{$category->id}}"> {{$category->name}} <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: 'Isi Konten Artikel',
                height: 300
            });
        });
    </script>
@endsection