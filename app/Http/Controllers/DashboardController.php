<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

use Illuminate\Support\Facades\Auth;

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

        if (Auth::user()->level == 'admin') {
            $datas = Permohonan::orderBy('created_at','DESC')->take(5)->get();
        }else{
            $datas = Permohonan::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->take(5)->get();
        }
        return view('admin.dashboard', compact('all','datas','count'));
    }
}
