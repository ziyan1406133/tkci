<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Model\Accessory\Accessory;
use App\Model\Accessory\Seller;
use App\Model\Article\Article;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;

class AccessoryController extends Controller
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
        $accessories = Accessory::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.accessory.index', compact('accessories'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories = Accessory::orderBy('created_at', 'desc')->paginate(5);

        $random_artikel = Article::where('status', 'Published')->inRandomOrder()->limit(6)->get();
        
        return view('pages.frontsite.accessory.index', compact('accessories', 'random_artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = Seller::orderBy('name', 'asc')->get();

        return view('pages.backsite.accessory.create', compact('sellers'));
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

        $accessory = new Accessory;
        $accessory->name = $name;
        // $accessory->slug = Str::slug($name, '-');
        $accessory->price = $request->price;
        $accessory->description = $request->description;
        $accessory->seller_id = $request->seller_id;
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/aksesoris/');
            $request->file('image')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $accessory->image = "images/aksesoris/".$FileNameToStore;
        }
        $accessory->save();

        return redirect()->route('admin.aksesoris')->with('success', $name.' Berhasil Ditambahkan Ke Aksesoris');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $accessory = Accessory::where('slug', $slug)->first();   

        $random_artikel = Article::where('status', 'Published')->inRandomOrder()->limit(6)->get();
        
        return view('pages.frontsite.accessory.show', compact('accessory', 'random_artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sellers = Seller::orderBy('name', 'asc')->get();
        $accessory = Accessory::findOrFail($id);
        
        return view('pages.backsite.accessory.edit', compact('sellers', 'accessory'));
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

        $accessory = Accessory::findOrFail($id);
        $accessory->name = $name;
        // $accessory->slug = Str::slug($name, '-');
        $accessory->price = $request->price;
        $accessory->description = $request->description;
        $accessory->seller_id = $request->seller_id;
        if($request->hasFile('image')){

            if($accessory->image !== 'images/article/no_cover.png') {
                $file = public_path($accessory->image);
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/aksesoris/');
            $request->file('image')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $accessory->image = "images/aksesoris/".$FileNameToStore;
        }
        $accessory->save();

        return redirect()->route('admin.aksesoris')->with('success', $name.' Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $accessory = Accessory::findOrFail($id);

        if($accessory->image !== 'images/article/no_cover.png') {
            $file = public_path($accessory->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $accessory->delete();

        return redirect()->route('admin.accessory')->with('success', 'Aksesoris Berhasil Dihapus');
    }
}
