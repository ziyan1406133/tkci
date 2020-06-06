<?php

namespace App\Http\Controllers;

use App\Model\Wilayah\Kabupaten;
use App\Model\Wilayah\Provinsi;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    //

    public function kabupaten(Request $request)
    {
        $provinsi_id = $request->get('provinsi_id');
        $provinsi = Provinsi::findOrFail($provinsi_id);
        $kabupaten = $provinsi->kabupaten;
        return response()->json($kabupaten);
    }
  
    public function kecamatan(Request $request)
    {
        $kabupaten_id = $request->get('kabupaten_id');
        $kabupaten = Kabupaten::findOrFail($kabupaten_id);
        $kecamatan = $kabupaten->kecamatan;
        return response()->json($kecamatan);
    }
}
