
<!-- Modal -->
<div class="modal fade" id="addGallery" tabindex="-1" role="dialog" 
    aria-labelledby="addGalleryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buat Galeri</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" 
                        placeholder="Judul Galeri" maxlength="20" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Gambar Cover</label>
                    <input type="file" class="form-control-file" name="cover" id="cover" required>
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