@extends('layouts.backsite')

@section('content')
<h4 class="mb-4">Tambah Cabang</h4>
<form action="{{route('cabang.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- 1 --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="branch_name" class="form-control" placeholder="Nama Cabang" required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Latitude" readonly required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Longitude" readonly required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <select name="provinsi" class="form-control" id="provinsi" required>
                    <option value="">-- Pilih Provinsi --</option>
                    @foreach ($provinsi as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="kabupaten" class="form-control" id="kabupaten" required>
                    <option value="">Pilih provinsi terlebih dahulu</option>
                </select>
            </div>
            <div class="form-group">
                <select name="kecamatan" class="form-control" id="kecamatan" required>
                    <option value="">Pilih kabupaten terlebih dahulu</option>
                </select>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <textarea name="address" id="address" maxlength="255"
                    class="form-control" rows="5" placeholder="Alamat Lengkap"></textarea>
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
            class="form-control" rows="20"></textarea>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Ketua Cabang" name="chairman_name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email Cabang" name="email" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="No. Telp. Cabang" name="phone" required>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="zmdi zmdi-facebook"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username Facebook" name="facebook" id="facebook">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="zmdi zmdi-twitter"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username Twitter" name="twitter" id="twitter">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="zmdi zmdi-instagram"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username Instagram" name="instagram" id="instagram">
                </div>
                <small>Tulis username tanpa tanda '@'</small>
            </div>
            <div class="form-group">
                <label class="form-control-label">Foto</label>
                <input type="file" name="image" id="image" class="form-control-file" required>
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
            </div>
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
    function myMap() {
        var mapOptions = {
            center: new google.maps.LatLng(-1.5543869, 119.5646224),
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        

        //FUNGSI JIKA MAPS DI KLIK
        var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        google.maps.event.addListener(map, 'click', function (e) {
            //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());

            //MASUKAN LATITUDE LONGITUDE YANG DIDAPATKAN KE VARIABEL
            var latitude = e.latLng.lat();
            var longitude = e.latLng.lng();

            $("#submit").attr("disabled", false);

            //PEMBANDING, JIKA TES(LONGITUDE) BELUM TERISI LONGITUDE, MAKA LAKUKAN AKSI
            var tes = $("#longitude").val();
            if(tes == "")
            {
                //MENAMBAHKAN MARKER/TANDA PADA POSISI LONGITUDE LATITUDE YANG DI KLIK KE 
                var posisiklik = {lat: e.latLng.lat(), lng: e.latLng.lng()};
                var marker = new google.maps.Marker({
                    position: posisiklik,
                    map: map,
                    draggable :true
                });

                //MEMASUKAN NILAI LATITUDE LONGITUDE PADA FORM INPUT
                var latitude = e.latLng.lat()
                var longitude = e.latLng.lng();

                $('#latitude').val(latitude);
                $('#longitude').val(longitude);

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
            else{

            }
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmn7gShOLqN1352QVc-bEGuaIRkzEoPJ8&callback=myMap"></script>
@endsection