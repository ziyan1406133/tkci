
<!-- Modal -->
<div class="modal fade" id="editDonation_{{ $donation->id }}" tabindex="-1" role="dialog" 
    aria-labelledby="editDonationLabel_{{ $donation->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Catat Donasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('donasi.update', $donation->id)}}" method="post">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label">Tanggal Donasi</label>
                    <input type="date" class="form-control" name="date" id="date" value="{{ $donation->date }}"
                        placeholder="Tanggal" required>
                </div>
                <div class="form-group">
                    <select name="branch" class="form-control" id="branch" required>
                        <option value="">-- Pilih Cabang --</option>
                        @foreach ($branches as $branch)
                            @if ($branch->id == $donation->branch_id)
                                <option value="{{ $branch->id }}" selected>{{ $branch->branch_name }}</option>
                            @else
                                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="donator" id="donator" class="form-control" value="{{ $donation->donator }}"
                    placeholder="Nama Donatur" maxlength="20" required>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                        Rp.
                        </div>
                        <input type="number" class="form-control" value="{{ $donation->nominal }}"
                        placeholder="Nominal Donasi" name="nominal" id="nominal" required>
                    </div>
                    <small>isi dengan angka saja tanpa tanda baca</small>
                </div>
            </div>
            <input type="hidden" name="current_page" id="current_page" value="{{ Request::url() }}">
            <div class="modal-footer">
                <button type="button" class="btn btn-empty" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" >Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>