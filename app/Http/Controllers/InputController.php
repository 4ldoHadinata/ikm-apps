<?php

namespace App\Http\Controllers;

use App\Kuesioner;
use App\SkalaLikert;
use App\JenisPelayanan;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index($id)
    {
        $data = Kuesioner::all();
        $jenis_pelayanan = JenisPelayanan::all();
        $no = 1;

        return view('pages.index', compact('data', 'jenis_pelayanan', 'id', 'no'));
    }

    public function store()
    {
        $data = request()->all();

        SkalaLikert::create($data);
        return redirect()->route('welcome');
    }
}
