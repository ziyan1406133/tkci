
<!-- Modal -->
<div class="modal fade" id="deleteAccessory_{{$accessory->id}}" tabindex="-1" role="dialog" 
    aria-labelledby="deleteAccessoryLabel_{{$accessory->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Aksesoris</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('aksesoris.destroy', $accessory->id)}}" method="post">
            @method('delete')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    Anda yakin untuk menghapus aksesoris berikut? <br>
                    > {{$accessory->name}}
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