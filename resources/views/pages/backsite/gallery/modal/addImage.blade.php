
<!-- Modal -->
<div class="modal fade" id="addImage" tabindex="-1" role="dialog" 
    aria-labelledby="addImageLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar di Galeri Ini</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('image.update', $gallery->id)}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Gambar Galeri</label>
                    <input type="file" id="images" name="images[]" multiple="" class="form-control-file" required>
                    <small>Gambar yang diupload bisa lebih dari satu sekaligus</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-empty" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="submit_images" >Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
