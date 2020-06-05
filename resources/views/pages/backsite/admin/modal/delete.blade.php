
<!-- Modal -->
<div class="modal fade" id="deleteAdmin_{{$admin->id}}" tabindex="-1" role="dialog" 
    aria-labelledby="deleteAdminLabel_{{$admin->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('admin.destroy', $admin->id)}}" method="post">
            @method('delete')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    Anda yakin untuk menghapus Akun Ini? <br>
                    > {{$admin->name}} ({{ $admin->email }})
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-empty" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger" >Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>