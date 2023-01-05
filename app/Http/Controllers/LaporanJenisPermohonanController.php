<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPermohonan;
use App\Models\JenisCiptaan;
use App\Models\BiayaJenisCiptaan;
use Illuminate\Support\Facades\Auth;
use PDF;

class LaporanJenisPermohonanController extends Controller
{
    public function index()
    {
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }
        $datas = JenisCiptaan::all();

        return view("admin.laporan_jenis_permohonan.index", compact('datas'));
    }


    public function store(Request $request)
    {
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }
        $jenis_ciptaan = JenisCiptaan::create([
            'nama_jenis_ciptaan' => $request->jenis_ciptaan,
        ]);

        for ($i=0; $i < count($request->biaya); $i++) { 
            BiayaJenisCiptaan::create([
                'jenis_ciptaan_id' => $jenis_ciptaan->id,
                'jenis_permohonan_id' => $request->jenis_permohonan_id[$i],
                'biaya' => $request->biaya[$i],
            ]);
        }

        return redirect(route('jenis_ciptaan.index'))->with('success','Jenis Ciptaan Berhasil Ditambahkan !');
    }


}