<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class DashboardController extends Controller
{
    
    public function index()
    {
        $all = Permohonan::all();
        $countProses = Permohonan::where('status','proses')->count();
        $countTerima = Permohonan::where('status','terima')->count();
        $countTolak = Permohonan::where('status','tolak')->count();
        $count = [
            'tolak' => $countTolak,
            'terima' => $countTerima,
            'proses' => $countProses,
        ];
        $datas = Permohonan::orderBy('created_at','DESC')->take(5)->get();
        return view('admin.dashboard', compact('all','datas','count'));
    }
}
