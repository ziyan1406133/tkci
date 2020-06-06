@extends('layouts.backsite')

@section('content')
<h4 class="mb-4">Edit Cabang</h4>
<form action="{{route('cabang.update', $branch->id)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    {{-- 1 --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="branch_name" value="{{ $branch->branch_name }}"
                class="form-control" placeholder="Nama Cabang" required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="latitude" id="latitude" value="{{ $branch->latitude }}"
                        class="form-control" placeholder="Latitude" readonly required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="longitude" id="longitude" value="{{ $branch->longitude }}"
                        class="form-control" placeholder="Longitude" readonly required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <select name="provinsi" class="form-control" id="provinsi" required>
                    <option value="">-- Pilih Provinsi --</option>
                    @foreach ($provinsi as $item)
                        @if ($item->id == $branch->provinsi_id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="kabupaten" class="form-control" id="kabupaten" required>
                    <option value="">-- Pilih Kabupaten --</option>
                    @foreach ($kabupaten as $item)
                        @if ($item->id == $branch->kabupaten_id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="kecamatan" class="form-control" id="kecamatan" required>
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach ($kecamatan as $item)
                        @if ($item->id == $branch->kecamatan_id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <textarea name="address" id="address" maxlength="255"
                    class="form-control" rows="5" placeholder="Alamat Lengkap">{{ $branch->address }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <small>Silahkan pilih lokasi pada peta</small>
            <div id="googleMap" style="width:100%;height:400px;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <textarea name="description" id="description" 
            class="form-control" rows="20">{{ $branch->description }}</textarea>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <input type="text" class="form-control" value="{{ $branch->chairman_name }}"
                placeholder="Nama Ketua Cabang" name="chairman_name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" value="{{ $branch->email }}"
                placeholder="Email Cabang" name="email" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="{{ $branch->phone }}"
                placeholder="No. Telp. Cabang" name="phone" required>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="zmdi zmdi-facebook"></span>
                    </div>
                    <input type="text" class="form-control" value="{{ $branch->facebook }}"
                    placeholder="Username Facebook" name="facebook" id="facebook">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="zmdi zmdi-twitter"></span>
                    </div>
                    <input type="text" class="form-control" value="{{ $branch->twitter }}"
                    placeholder="Username Twitter" name="twitter" id="twitter">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="zmdi zmdi-instagram"></span>
                    </div>
                    <input type="text" class="form-control" value="{{ $branch->instagram }}"
                    placeholder="Username Instagram" name="instagram" id="instagram">
                </div>
                <small>Tulis username tanpa tanda '@'</small>
            </div>
            <div class="form-group">
                <label class="form-control-label">Foto</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
            </div>
            <img src="{{ asset($branch->image) }}" width="40%" alt="Foto Cabang">
        </div>
    </div>
</form>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#description').summernote({
            placeholder: 'Deskripsi Cabang',
            height: 400
        });
    });
</script>
<script type="text/javascript">
$('#provinsi').on('change', function(e){
    var provinsi_id = e.target.value;
    // console.log(provinsi_id);
    $.get('/json-kabupaten?provinsi_id=' + provinsi_id,function(data) {
        // console.log(data);
        $('#kabupaten').empty();
        $('#kabupaten').append('<option value="0" disable="true" selected="true">-- Pilih Kabupaten --</option>');

        $('#kecamatan').empty();
        $('#kecamatan').append('<option value="0" disable="true" selected="true">Pilih kabupaten terlebih dahulu</option>');

        $.each(data, function(index, kabupatenObj){
            $('#kabupaten').append('<option value="'+ kabupatenObj.id +'">'+ kabupatenObj.nama +'</option>');
        })
    });
});

$('#kabupaten').on('change', function(e){
    var kabupaten_id = e.target.value;
    // console.log(kabupaten_id);
    $.get('/json-kecamatan?kabupaten_id=' + kabupaten_id,function(data) {
        // console.log(data);
        $('#kecamatan').empty();
        $('#kecamatan').append('<option value="0" disable="true" selected="true">-- Pilih Kecamatan --</option>');

        $.each(data, function(index, kecamatanObj){
        $('#kecamatan').append('<option value="'+ kecamatanObj.id +'">'+ kecamatanObj.nama +'</option>');
        })
    });
});
</script>
<script>
    var old_latitude = parseFloat($('#latitude').val());
    var old_longitude = parseFloat($('#longitude').val());

    function myMap() {
        var mapOptions = {
            center: new google.maps.LatLng(old_latitude, old_longitude),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        
        var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        var posisiklik = {lat: old_latitude, lng: old_longitude};
        var marker = new google.maps.Marker({
            position: posisiklik,
            map: map,
            draggable :true
        });

        //JIKA DILAKUKAN AKSI DRAG PADA MARKER
        google.maps.event.addListener(marker, 'dragend', function(){

            //MENDAPATKAN POSISI BARU DARI MARKER YANG DI DRAG
            var latitude = marker.getPosition().lat();
            var longitude = marker.getPosition().lng();

            //MERUBAH NILAI LATITUDE LONGITUDE PADA FORM INPUT
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf7FALA_C8nQFFy1A8D6NWavSyS_rqIBc&callback=myMap"></script>
@endsection