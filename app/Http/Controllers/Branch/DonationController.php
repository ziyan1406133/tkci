<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Model\Branch\Branch;
use App\Model\Branch\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $branches = Branch::orderBy('branch_name', 'asc')->get();
        $donations = Donation::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.donation.index', compact('branches', 'donations'));
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
        $date = $request->date;

        $donation = new Donation;
        $donation->branch_id = $request->branch;
        $donation->date = $date;
        $donation->year = date_format(date_create($date), 'Y');
        $donation->donator = $request->donator;
        $donation->nominal = $request->nominal;
        $donation->save();

        return redirect($request->current_page)->with('success', 'Donasi Berhasil Dicatat');
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
        $date = $request->date;

        $donation = Donation::findOrFail($id);
        $donation->branch_id = $request->branch;
        $donation->date = $date;
        $donation->year = date_format(date_create($date), 'Y');
        $donation->donator = $request->donator;
        $donation->nominal = $request->nominal;
        $donation->save();

        return redirect($request->current_page)->with('success', 'Donasi Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
    public function hapus_donasi(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return redirect($request->current_page)->with('success', 'Donasi Berhasil Dihapus');
    }
}
