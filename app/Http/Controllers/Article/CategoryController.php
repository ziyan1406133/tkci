<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Model\Article\Category;
use App\Model\Article\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'tanpa_kategori']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        return view('pages.backsite.category.index', compact('categories'));
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
        $name = $request->name;
        // $slug = Str::slug($name, '-');

        $category = new Category;
        $category->name = $name;
        // $category->slug = $slug;
        $category->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $id = $category->id;

        $articles = Article::where('status', 'Published')
                    ->whereHas('categories', function($query) use ($id) {
                        $query->where('categories.id', $id);
                    })
                    ->orderBy('created_at', 'desc')->paginate(5);

        $random_artikel = Article::where('status', 'Published')->inRandomOrder()->limit(6)->get();
        
        return view('pages.frontsite.article.index', compact('articles', 'random_artikel'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tanpa_kategori()
    {

        $articles = Article::where('status', 'Published')
                    ->doesnthave('categories')
                    ->orderBy('created_at', 'desc')->paginate(5);

        $random_artikel = Article::where('status', 'Published')->inRandomOrder()->limit(6)->get();
        
        return view('pages.frontsite.article.index', compact('articles', 'random_artikel'));
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
        $name = $request->name;
        $slug = Str::slug($name, '-');

        $category = Category::findOrFail($id);
        $category->name = $name;
        $category->slug = $slug;
        $category->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Dihapus');
    }
}
