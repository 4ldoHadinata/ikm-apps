<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SkalaLikert;
use Illuminate\Http\Request;

class SkalaLikertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SkalaLikert::all();

        return view('pages.admin.skala_likert.index', compact('data'));
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
     * @param  \App\SkalaLikert  $skalaLikert
     * @return \Illuminate\Http\Response
     */
    public function show(SkalaLikert $skalaLikert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SkalaLikert  $skalaLikert
     * @return \Illuminate\Http\Response
     */
    public function edit(SkalaLikert $skalaLikert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SkalaLikert  $skalaLikert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkalaLikert $skalaLikert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SkalaLikert  $skalaLikert
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkalaLikert $skalaLikert)
    {
        //
    }
}
