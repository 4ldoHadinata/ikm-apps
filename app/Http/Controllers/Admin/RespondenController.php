<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Responden;
use Illuminate\Http\Request;

class RespondenController extends Controller
{
    public function index()
    {
        $data = Responden::all();

        return view('pages.admin.responden.index', compact('data'));
    }
}
