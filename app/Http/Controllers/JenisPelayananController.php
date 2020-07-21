<?php

namespace App\Http\Controllers;

use App\JenisPelayanan;
use App\Bidang;
use Illuminate\Http\Request;

class JenisPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisPelayanan::all();

        return view('pages.admin.jenis_pelayanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Bidang::all();
        return view('pages.admin.jenis_pelayanan.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->all();

        JenisPelayanan::create($data);
        return redirect()->route('jenis_pelayanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisPelayanan  $jenispelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPelayanan $jenispelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisPelayanan  $jenis_pelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis_pelayanan = JenisPelayanan::findOrFail($id);
        $data_bidang = Bidang::all();

        return view('pages.admin.jenis_pelayanan.edit', compact(['jenis_pelayanan', 'data_bidang']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisPelayanan  $jenis_pelayanan
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = request()->all();

        $jenis_pelayanan = JenisPelayanan::findOrFail($id);

        $jenis_pelayanan->update($data);

        return redirect()->route('jenis_pelayanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisPelayanan  $jenis_pelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis_pelayanan = JenisPelayanan::findOrFail($id);
        $jenis_pelayanan->delete();
        return redirect()->route('jenis_pelayanan.index');
    }
}
