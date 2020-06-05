<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Model\Article\Article;
use App\Model\Article\Category;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
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
        $articles = Article::orderBy('created_at', 'desc')->where('status', 'Published')->paginate(9);

        $page = 'Semua Artikel';
        return view('pages.backsite.article.index', compact('articles', 'page'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_article_index($username)
    {
        $admin = User::where('username', $username)->first();
       
        $articles_paginated =  $admin->setRelation('published_articles_paginated', $admin->published_articles()->paginate(9));
        $articles = $admin->published_articles_paginated;

        $page = 'Artikel <a href="'.route('admin.show', $username).'">@'.$username.'</a>';
        return view('pages.backsite.article.index', compact('articles', 'page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_articles()
    {
        $articles = Article::orderBy('created_at', 'desc')
                    ->where('status', 'Published')
                    ->where('author_id', Auth::user()->id)
                    ->paginate(9);

        $page = 'Artikel Saya';
        return view('pages.backsite.article.index', compact('articles', 'page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_drafts()
    {
        $articles = Article::orderBy('created_at', 'desc')
                    ->where('status', 'Draft')
                    ->where('author_id', Auth::user()->id)->paginate(9);

        $page = 'Draft Saya';
        return view('pages.backsite.article.index', compact('articles', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.backsite.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $draft = $request->draft;
        $title = $request->title;

        $article = new Article;
        $article->title = $title;
        $article->slug = Str::slug($title, '-');
        $article->content = $request->content;
        $article->date = Carbon::now();
        $article->author_id = Auth::user()->id;
        if($draft !== 'on') {
            $article->status = 'Published';
        } else {
            $article->status = 'Draft';
        }
        if($request->hasFile('cover')){
            $filenameWithExt = $request->file('cover')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/article/');
            $request->file('cover')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $article->cover = "images/article/".$FileNameToStore;
        }
        $article->save();

        $last = Article::orderBy('created_at', 'desc')->where('author_id', Auth::user()->id)->first();
        foreach ($request->categories as $category) {
            $last->categories()->attach($category);
        }

        if($draft !== 'on') {
            return redirect()->route('my.articles')->with('success', 'Artikel Berhasil Dibuat');
        } else {
            return redirect()->route('my.drafts')->with('success', 'Artikel Berhasil Disimpan Ke Draft');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
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
        $article = Article::findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();
        $check = $article->categories;
        $category_ids = array();
        if(count($check) > 0) {
            foreach($check as $c) {
                $category_ids[] = $c->id; 
            }
        }
        if(Auth::user()->id == $article->author_id) {
            return view('pages.backsite.article.edit', compact('article','category_ids', 'categories'));
        } else {
            return view('errors.403');
        }
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
        $draft = $request->draft;
        $title = $request->title;

        $article = Article::findOrFail($id);
        $article->categories()->detach();

        $article->title = $title;
        $article->slug = Str::slug($title, '-');
        $article->content = $request->content;
        $article->date = Carbon::now();
        $article->author_id = Auth::user()->id;
        if($draft !== 'on') {
            $article->status = 'Published';
        } else {
            $article->status = 'Draft';
        }
        if($request->hasFile('cover')){
            $filenameWithExt = $request->file('cover')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/article/');
            $request->file('cover')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $article->cover = "images/article/".$FileNameToStore;
        }

        foreach ($request->categories as $category) {
            $article->categories()->attach($category);
        }

        $article->save();
        
        if($draft !== 'on') {
            return redirect()->route('my.articles')->with('success', 'Artikel Berhasil Diperbaharui');
        } else {
            return redirect()->route('my.drafts')->with('success', 'Artikel Berhasil Disimpan Ke Draft');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $status = $article->status;

        if($article->cover !== 'images/article/no_cover.png') {
            $file = public_path($article->cover);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $article->delete();

        if($status == 'Published') {
            return redirect()->route('my.articles')->with('success', 'Artikel Berhasil Dihapus');
        } else {
            return redirect()->route('my.drafts')->with('success', 'Draft Berhasil Dihapus');
        }
    }
}
