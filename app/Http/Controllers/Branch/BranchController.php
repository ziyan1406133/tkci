<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Model\Branch\Branch;
use App\Model\Wilayah\Kabupaten;
use App\Model\Wilayah\Kecamatan;
use App\Model\Wilayah\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Map;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        $branches = Branch::orderBy('branch_name', 'desc')->get();

        return view('pages.backsite.branch.index', compact('branches'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_branch_map()
    {
        $branches = Branch::get();

        $config = array();
        $config['map_height'] = '550px';
        $config['zoom'] = 'auto';
        $config['draggableCursor'] = 'default';
        Map::initialize($config);
        
        $config['cluster'] = FALSE;
        $config['clusterStyles'] = array(
            array(
            "url"=>"https://raw.githubusercontent.com/googlemaps/js-marker-clusterer/gh-pages/images/m1.png",
            "width"=>"53",
            "height"=>"53"
            ));
        Map::initialize($config);
        foreach($branches as $branch){
            $total_donasi = 0;
            foreach ($branch->donations as $donation) {
                $total_donasi = $total_donasi + $donation->nominal;
            }
            $marker = array();
            $marker['position'] = $branch->latitude.', '.$branch->longitude;
            $marker['infowindow_content'] = '<div style="text-align: center"><strong>'.$branch->branch_name.'</strong><hr><img src="'.asset($branch->image).'"style="height: 100px"><br><br><a target="_blank" href="'.route('cabang.show',$branch->slug).'">Lihat Cabang</a><br><a target="_blank" href="https://www.google.com/maps/dir//'.$branch->latitude.','.$branch->longitude.'">Petunjuk Arah</a><br>Total Donasi : Rp. '.number_format($total_donasi,0,",",".").'</div>';
            Map::add_marker($marker);
        }

        Map::initialize($config);
        $map = Map::create_map();

        return view('pages.backsite.branch.map', compact('map'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::orderBy('nama', 'asc')->get();

        return view('pages.backsite.branch.create', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|max:1999',
        ],
        [
            'image.image' => 'File yang diupload harus berupa gambar',
            'max' => 'Maksimum ukuran file yang diupload adalah 2 MB'
        ]);

        $latitude = substr($request->input('latitude'), 0, 10);
        $longitude = substr($request->input('longitude'), 0, 11);

        $branch = new Branch;
        $branch->branch_name = $request->branch_name;
        $branch->latitude = $latitude;
        $branch->longitude = $longitude;
        $branch->provinsi_id = $request->provinsi;
        $branch->kabupaten_id = $request->kabupaten;
        $branch->kecamatan_id = $request->kecamatan;
        $branch->address = $request->address;
        $branch->description = $request->description;
        $branch->chairman_name = $request->chairman_name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->facebook = $request->facebook;
        $branch->twitter = $request->twitter;
        $branch->instagram = $request->instagram;
        if($request->hasFile('image')){
            
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/article/');
            $request->file('image')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $branch->image = "images/article/".$FileNameToStore;
        }
        $branch->save();

        return redirect()->route('admin.cabang')->with('success', 'Cabang Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::orderBy('nama', 'asc')->get();

        $branch = Branch::findOrFail($id);

        $kabupaten = Kabupaten::where('provinsi_id', $branch->provinsi_id)->orderBy('nama', 'asc')->get(); 
        $kecamatan = Kecamatan::where('kabupaten_id', $branch->kabupaten_id)->orderBy('nama', 'asc')->get(); 

        return view('pages.backsite.branch.edit', compact('provinsi', 'branch', 'kabupaten', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|max:1999',
        ],
        [
            'image.image' => 'File yang diupload harus berupa gambar',
            'max' => 'Maksimum ukuran file yang diupload adalah 2 MB'
        ]);

        $latitude = substr($request->input('latitude'), 0, 10);
        $longitude = substr($request->input('longitude'), 0, 11);

        $branch = Branch::findOrFail($id);
        $branch->slug = Str::slug($request->branch_name, '-');
        $branch->branch_name = $request->branch_name;
        $branch->latitude = $latitude;
        $branch->longitude = $longitude;
        $branch->provinsi_id = $request->provinsi;
        $branch->kabupaten_id = $request->kabupaten;
        $branch->kecamatan_id = $request->kecamatan;
        $branch->address = $request->address;
        $branch->description = $request->description;
        $branch->chairman_name = $request->chairman_name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->facebook = $request->facebook;
        $branch->twitter = $request->twitter;
        $branch->instagram = $request->instagram;
        if($request->hasFile('image')){
            
            if($branch->image !== 'images/article/no_cover.png') {
                $file = public_path($branch->cover);
                if (file_exists($file)) {
                    unlink($file);
                }
            }

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/article/');
            $request->file('image')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $branch->image = "images/article/".$FileNameToStore;
        }
        $branch->save();

        return redirect()->route('admin.cabang')->with('success', 'Cabang Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        
        $file = public_path($branch->image);
        if (file_exists($file)) {
            unlink($file);
        }

        $branch->delete();
        
        return redirect()->route('admin.cabang')
            ->with('success', 'Cabang Berhasil Dihapus');
    }
}
