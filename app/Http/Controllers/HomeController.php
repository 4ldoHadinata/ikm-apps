<?php

namespace App\Http\Controllers;

use App\Responden;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function store()
    {
        $data = request()->validate([
            'nama' => ['required'],
            'nik' => ['required'],
            'usia' => ['required']
        ]);

        Responden::create($data);
        $id = Responden::where('nik', $data['nik'])->first();
        return redirect()->route('input', ['id' => $id]);
    }
}
