<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Model\Gallery\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', $except = ['show', 'index']);
    }

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
        $galleries = Gallery::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.gallery.index', compact('galleries'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'cover' => 'image|max:1999',
        ],
        [
            'cover.image' => 'File yang diupload harus berupa gambar',
            'max' => 'Maksimum ukuran file yang diupload adalah 2 MB'
        ]);

        $name = $request->name;

        $gallery = new Gallery;
        $gallery->name = $name;
        $gallery->author_id = Auth::user()->id;
        
        $filenameWithExt = $request->file('cover')->getClientOriginalName();
        $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover')->getClientOriginalExtension();
        $FileNameToStore = $filename.'_'.time().'_.'.$extension;
        $path = public_path('images/gallery/');
        $request->file('cover')->move($path, $FileNameToStore);

        //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

        $gallery->cover = "images/gallery/".$FileNameToStore;
        $gallery->save();

        return redirect()->route('admin.gallery')
            ->with('success', 'Galeri Berhasil Dibuat, silahkan tambahkan 
            gambar galeri tersebut <a href="'.route('admin.show.gallery', $gallery->slug).'">di sini</a>');
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
    public function admin_show($slug)
    {
        $gallery = Gallery::where('slug', $slug)->first();

        return view('pages.backsite.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'cover' => 'image|max:1999',
        ],
        [
            'cover.image' => 'File yang diupload harus berupa gambar',
            'max' => 'Maksimum ukuran file yang diupload adalah 2 MB'
        ]);
        
        $name = $request->name;
        $slug = Str::slug($name, '-');

        $gallery = Gallery::findOrFail($id);
        $gallery->name = $name;
        $gallery->slug = $slug;
        
        if($request->hasFile('cover')){

            $file = public_path($gallery->cover);
            if (file_exists($file)) {
                unlink($file);
            }

            $filenameWithExt = $request->file('cover')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/gallery/');
            $request->file('cover')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $gallery->cover = "images/gallery/".$FileNameToStore;
        }
        $gallery->save();

        return redirect()->route('admin.show.gallery', $gallery->slug)
            ->with('success', 'Galeri Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        $file = public_path($gallery->cover);
        if (file_exists($file)) {
            unlink($file);
        }
        foreach ($gallery->images as $image) {
            $file = public_path($image->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $gallery->delete();
        
        return redirect()->route('admin.gallery')
            ->with('success', 'Galeri Berhasil Dihapus');
    }
}
