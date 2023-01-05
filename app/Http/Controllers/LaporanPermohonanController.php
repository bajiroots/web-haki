<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Permohonan;
use App\Models\JenisCiptaan;
use App\Models\JenisPermohonan;
use App\Models\SubJenisCiptaan;
use App\Models\BiayaJenisCiptaan;
use App\Models\Provinsi;
use App\Models\Kota;
use PDF;

class LaporanPermohonanController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }


            $bulan = $request->get('bulan');
            $tahun = $request->get('tahun');
        

        if($bulan != null && $tahun != null){
            $datas = Permohonan::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();
        }

        else{
            $datas = Permohonan::all();

        }




        return view("admin.laporan_permohonan.index", compact('datas', 'request'));
    }

    public function downloadpdf(Request $request )
    {
      
            $bulan = $request->get('bulan');
            $tahun = $request->get('tahun');
        

        if($bulan != null && $tahun != null){
            $datas = Permohonan::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();
        }

        else{
            $datas = Permohonan::all();

        }
        

        // return view('admin.laporan_permohonan.download',['datas' => $datas]);
        $pdf = PDF::loadview('admin.laporan_permohonan.download',['datas' => $datas])->setOptions(['defaultfont' => 'sans-serif']);
        $pdf->setPaper('A4', 'potrait');
        
        return $pdf->download('laporan_permohonan.pdf');
    }


}
