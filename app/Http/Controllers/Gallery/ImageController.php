<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Model\Gallery\Image;
use App\Model\Gallery\Gallery;
use Illuminate\Http\Request;

class ImageController extends Controller
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
        //
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
        $gallery = Gallery::findOrFail($id);
        foreach ($request->file('images') as $item) {

            $image = new Image;
            $filenameWithExt = $item->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $item->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/gallery_image/');
            $item->move($path, $FileNameToStore);
    
            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);
    
            $image->image = "images/gallery_image/".$FileNameToStore;
            $image->gallery_id = $id;
            $image->save();

        }

        return redirect()->route('admin.show.gallery', $gallery->slug)->with('success', 'Gambar berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $slug = $image->gallery->slug;

        $file = public_path($image->image);
        if (file_exists($file)) {
            unlink($file);
        }

        $image->delete();

        return redirect()->route('admin.show.gallery', $slug)->with('success', 'Gambar berhasil dihapus');
    }
}
