
<!-- Modal -->
<div class="modal fade" id="deleteDonation_{{$donation->id}}" tabindex="-1" role="dialog" 
    aria-labelledby="deleteDonationLabel_{{$donation->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Gambar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('donasi.hapus', $donation->id)}}" method="post">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    Anda yakin untuk menghapus donasi berikut? <br> <br>
                    Cabang : {{ $donation->branch->branch_name }} <br>
                    Donatur : {{ $donation->donator }} <br>
                    Nominal : Rp. {{number_format($donation->nominal,0,",",".")}}
                </div>
            </div>
            <input type="hidden" name="current_page" id="current_page" value="{{ Request::url() }}">
            <div class="modal-footer">
                <button type="button" class="btn btn-empty" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger" >Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>