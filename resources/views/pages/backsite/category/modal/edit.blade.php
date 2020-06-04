
<!-- Modal -->
<div class="modal fade" id="editCategory_{{$category->id}}" tabindex="-1" role="dialog" 
    aria-labelledby="editCategoryLabel_{{$category->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('kategori.update', $category->id)}}" method="post">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" 
                        placeholder="Nama Kategori" maxlength="20" value="{{$category->name}}" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-empty" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-warning">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>