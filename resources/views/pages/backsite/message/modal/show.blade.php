
<!-- Modal -->
<div class="modal fade" id="showMessage_{{$message->id}}" tabindex="-1" role="dialog" 
    aria-labelledby="showMessageLabel_{{$message->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Isi Pesan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>
                {{ $message->body }}
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-empty" data-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
</div>