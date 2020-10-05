<?php

namespace App\Http\Controllers;

use App\Responden;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.index');
    }

    public function store()
    {
        $data = request()->validate([
            'nama' => ['required'],
            'nik' => ['required'],
            'usia' => ['required'],
            'jenis_kelamin' => ['required'],
            'pendidikan' => ['required'],
            'pekerjaan' => ['required']
        ]);

        Responden::create($data);
        $id = Responden::where('nik', $data['nik'])->first();
        return redirect()->route('input', ['id' => $id]);
    }
}
