<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth', $excepts = ['homepage']);
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
        return view('pages.frontsite.homepage');
    }
}
