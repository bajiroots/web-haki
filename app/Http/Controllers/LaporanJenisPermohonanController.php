<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPermohonan;
use App\Models\JenisCiptaan;
use App\Models\BiayaJenisCiptaan;
use App\Models\Permohonan;
use App\Models\SubJenisCiptaan;
use Illuminate\Support\Facades\Auth;
use PDF;

class LaporanJenisPermohonanController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }

        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');

        $datas = JenisCiptaan::all();
        $ttl_biaya = [];
        foreach ($datas as $value) {
            $ttl_jenis_ciptaan = 0;
            if($bulan != null && $tahun != null){
                $permohonan = Permohonan::wherehas('SubJenisCiptaan', function($e) use($value){
                    $e->where('jenis_ciptaan_id', $value->id);
                })->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();
            }else{
                $permohonan = Permohonan::wherehas('SubJenisCiptaan', function($e) use($value){
                    $e->where('jenis_ciptaan_id', $value->id);
                })->get();
            }
            

            foreach ($permohonan as $d) {
                $ttl_jenis_ciptaan += $d->SubJenisCiptaan->jenisCiptaan->biayaJenisCiptaan->where('jenis_permohonan_id', $d->jenisPermohonan->id)->first()->biaya;
            }
            $ttl_biaya[] =  $ttl_jenis_ciptaan;
        }
        

        return view("admin.laporan_jenis_permohonan.index", compact('datas', 'ttl_biaya', 'request'));
    }



    public function downloadpdf(Request $request)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');

        $datas = JenisCiptaan::all();
        $ttl_biaya = [];
        foreach ($datas as $value) {
            $ttl_jenis_ciptaan = 0;
            if($bulan != null && $tahun != null){
                $permohonan = Permohonan::wherehas('SubJenisCiptaan', function($e) use($value){
                    $e->where('jenis_ciptaan_id', $value->id);
                })->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();
            }
            else{
                $permohonan = Permohonan::wherehas('SubJenisCiptaan', function($e) use($value){
                    $e->where('jenis_ciptaan_id', $value->id);
                })->get();
            }

            foreach ($permohonan as $d) {
                $ttl_jenis_ciptaan += $d->SubJenisCiptaan->jenisCiptaan->biayaJenisCiptaan->where('jenis_permohonan_id', $d->jenisPermohonan->id)->first()->biaya;
            }
            $ttl_biaya[] =  $ttl_jenis_ciptaan;
        }

        $pdf = PDF::loadview('admin.laporan_jenis_permohonan.download',['datas' => $datas, 'ttl_biaya' => $ttl_biaya])->setOptions(['defaultfont' => 'sans-serif']);
        $pdf->setPaper('A4', 'potrait');
        
        return $pdf->stream('laporan_jenis_permohonan.pdf');
    }



    


   
}