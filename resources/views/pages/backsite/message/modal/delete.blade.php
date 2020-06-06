
<!-- Modal -->
<div class="modal fade" id="deleteMessage_{{$message->id}}" tabindex="-1" role="dialog" 
    aria-labelledby="deleteMessageLabel_{{$message->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('message.destroy', $message->id)}}" method="post">
            @method('delete')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    Anda yakin untuk menghapus pesan ini? <br>
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