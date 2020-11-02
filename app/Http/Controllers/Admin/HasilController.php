<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\{HasilPerUnsur, HasilPerPelayanan};
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $hasil_per_unsur = HasilPerUnsur::all();
        $hasil_per_pelayanan = HasilPerPelayanan::all();

        return view('pages.admin.hasil.index', compact('hasil_per_unsur', 'hasil_per_pelayanan'));
    }
}
