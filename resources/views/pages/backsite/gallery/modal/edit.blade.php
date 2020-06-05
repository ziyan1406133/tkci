
<!-- Modal -->
<div class="modal fade" id="editGallery_{{ $gallery->id }}" tabindex="-1" role="dialog" 
    aria-labelledby="editGalleryLabel_{{ $gallery->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('gallery.update', $gallery->id)}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" value="{{ $gallery->name }}"
                        placeholder="Judul Galeri" maxlength="20" required>
                </div>
                <div class="form-group">
                    <label for="Gambar Cover"></label>
                    <input type="file" class="form-control-file" name="cover" id="cover">
                    <img src="{{ asset($gallery->cover) }}" alt="Gambar Cover">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-empty" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" >Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>