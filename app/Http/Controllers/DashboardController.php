<?php

namespace App\Http\Controllers;

use App\Model\Accessory\Accessory;
use App\Model\Article\Article;
use App\Model\Branch\Branch;
use App\Model\Branch\Donation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['homepage', 'contact']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tahun = date_format(date_create(Carbon::now()), 'Y');
        $cabang = Branch::get();
        $artikel = Article::where('status', 'Published')->get();
        $donasi = Donation::where('year', $tahun)->get();
        $total_donasi = 0;
        foreach ($donasi as $d) {
            $total_donasi = $total_donasi + $d->nominal;
        }

        $donations = Donation::orderBy('created_at', 'desc')->limit(10)->get();
        $articles = Article::where('status', 'Published')->orderBy('created_at', 'desc')->limit(9)->get();

        return view('pages.backsite.dashboard', compact('cabang', 'artikel', 'total_donasi', 'donations', 'articles'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage()
    {
        $satu_artikel = Article::where('status', 'Published')->orderBy('created_at', 'desc')->first();
        $dua_artikel = Article::where('status', 'Published')->orderBy('created_at', 'desc')->skip(1)->take(2)->get();
        $lima_artikel = Article::where('status', 'Published')->orderBy('created_at', 'desc')->skip(3)->take(5)->get();

        $random_artikel = Article::where('status', 'Published')->inRandomOrder()->limit(4)->get();
        $merchandise = Accessory::inRandomOrder()->limit(5)->get();

        return view('pages.frontsite.homepage', compact('satu_artikel', 'dua_artikel', 'lima_artikel', 'random_artikel', 'merchandise'));
    }

    public function contact()
    {
        return view('pages.frontsite.contact');
    }

    public function test_query()
    {
        $test = Article::where(function($q) {
                            $q->where('nomor', 1)
                            ->where('id_atribut', 'A01');
                        })->orWhere(function($q) {
                            $q->where('nomor', 1)
                            ->where('id_atribut', 'A09')
                            ->where('id_nilai', '9');
                        })->get();

        return $test;
    }
}
