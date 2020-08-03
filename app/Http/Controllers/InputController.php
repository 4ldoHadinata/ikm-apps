<?php

namespace App\Http\Controllers;

use App\Kuesioner;
use App\SkalaLikert;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index()
    {
        $data = Kuesioner::all();

        return view('pages.index', compact('data'));
    }

    public function store()
    {
        $data = request()->all();

        SkalaLikert::create($data);
        return redirect()->route('home');
    }
}
