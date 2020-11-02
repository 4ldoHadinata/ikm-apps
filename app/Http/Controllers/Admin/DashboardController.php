<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\HasilPerPelayanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'sangat_baik' => HasilPerPelayanan::where('hasil', 'SANGAT BAIK')->count(),
            'baik' => HasilPerPelayanan::where('hasil', 'BAIK')->count(),
            'kurang_baik' => HasilPerPelayanan::where('hasil', 'KURANG BAIK')->count(),
            'tidak_baik' => HasilPerPelayanan::where('hasil', 'TIDAK BAIK')->count()
        ]);
    }
}
