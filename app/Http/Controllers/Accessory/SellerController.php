<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Model\Accessory\Seller;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;

class SellerController extends Controller
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
    public function admin_index()
    {
        $sellers = Seller::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.seller.index', compact('sellers'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backsite.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;

        $seller = new Seller;
        $seller->name = $name;
        // $seller->slug = Str::slug($name, '-');

        $seller->code = $request->code;
        $seller->description = $request->description;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->facebook = $request->facebook;
        $seller->instagram = $request->instagram;
        $seller->twitter = $request->twitter;
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/seller/');
            $request->file('image')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $seller->image = "images/seller/".$FileNameToStore;
        }
        $seller->save();

        return redirect()->route('admin.seller')->with('success', $name.' Berhasil Ditambahkan Sebagai Seller');
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
        $seller = Seller::findOrFail($id);
        return view('pages.backsite.seller.edit', compact('seller'));
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
        $name = $request->name;

        $seller = Seller::findOrFail($id);
        $seller->name = $name;
        // $seller->slug = Str::slug($name, '-');
        $seller->code = $request->code;
        $seller->description = $request->description;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->facebook = $request->facebook;
        $seller->instagram = $request->instagram;
        $seller->twitter = $request->twitter;
        if($request->hasFile('image')){
            if($seller->image !== 'images/user/no_avatar.png') {
                $file = public_path($seller->image);
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/seller/');
            $request->file('image')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $seller->image = "images/seller/".$FileNameToStore;
        }
        $seller->save();

        return redirect()->route('admin.seller')->with('success', $name.' Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $seller = Seller::findOrFail($id);

        if($seller->image !== 'images/user/no_avatar.png') {
            $file = public_path($seller->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        foreach ($seller->accessories as $accessory) {
            if($accessory->image !== 'images/article/no_cover.png') {
                $file = public_path($accessory->image);
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }

        $seller->delete();

        return redirect()->route('admin.seller')->with('success', 'Seller Berhasil Dihapus');
    }
}
