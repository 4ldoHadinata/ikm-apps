<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kuesioner;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kuesioner::all();

        return view('pages.admin.kuesioner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kuesioner.create');
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

        Kuesioner::create($data);
        return redirect()->route('kuesioner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function show(Kuesioner $kuesioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kuesioner = Kuesioner::findOrFail($id);

        return view('pages.admin.kuesioner.edit', compact('kuesioner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = request()->all();

        $kuesioner = Kuesioner::findOrFail($id);

        $kuesioner->update($data);

        return redirect()->route('kuesioner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kuesioner = Kuesioner::findOrFail($id);
        $kuesioner->delete();
        return redirect()->route('kuesioner.index');
    }
}
