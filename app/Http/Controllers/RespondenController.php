<?php

namespace App\Http\Controllers;

use App\Responden;
use Illuminate\Http\Request;

class RespondenController extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }

    public function store()
    {
        $data = request()->all();

        Responden::create($data);
        $id = Responden::where('nik', $data['nik'])->first();
        return redirect()->route('home', ['id' => $id]);
    }
}
