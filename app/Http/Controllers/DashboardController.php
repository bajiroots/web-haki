<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {

        if ($request->tahun != null) {
            $tahunIni = $request->tahun;
        }else{
            $tahunIni = date('Y');
        }

        $all = Permohonan::all();
        
        $countProses = Permohonan::where('status','proses')->whereYear('created_at', $tahunIni)->count();
        $countTerima = Permohonan::where('status','terima')->whereYear('created_at', $tahunIni)->count();
        $countTolak = Permohonan::where('status','tolak')->whereYear('created_at', $tahunIni)->count();
        $count = [
            'tolak' => $countTolak,
            'terima' => $countTerima,
            'proses' => $countProses,
        ];

        //menghitung pendapatan tahunan
        $pendapatanTahun = 0;

        $tahunSebelumnya = $tahunIni - 1;
        $PermohonanTahunIni = Permohonan::whereYear('created_at', $tahunIni)->where('status','terima')->get();

        foreach ($PermohonanTahunIni as $items) {
            $pendapatanTahun = $items->SubJenisCiptaan->jenisCiptaan->biayaJenisCiptaan->where('jenis_permohonan_id', $items->jenisPermohonan->id)->first()->biaya + $pendapatanTahun;
        }
        
        $pendapatanTahunSebelumnya = 0;
        $PermohonanTahunSebelumnya = Permohonan::whereYear('created_at', $tahunSebelumnya)->where('status','terima')->get();

        foreach ($PermohonanTahunSebelumnya as $items) {
            $pendapatanTahunSebelumnya = $items->SubJenisCiptaan->jenisCiptaan->biayaJenisCiptaan->where('jenis_permohonan_id', $items->jenisPermohonan->id)->first()->biaya + $pendapatanTahunSebelumnya;
        }
        
        //cek division by zero
        if ($pendapatanTahunSebelumnya == 0 || $pendapatanTahun == 0 ) {
            $perbandinganTahun = 100;
        }else{
            $perbandinganTahun = $pendapatanTahun / $pendapatanTahunSebelumnya * 100 ;
        }


        if ($pendapatanTahun < $pendapatanTahunSebelumnya) {
            $perbandinganTahun = '-' . $perbandinganTahun;
        }else{
            $perbandinganTahun = '+' . $perbandinganTahun;
        }

        // menghitung pendapatan bulanan
        $pendapatanBulan = 0;

        $bulanIni = date('m');
        $bulanSebelumnya = $bulanIni - 1;
        $PermohonanBulanIni = Permohonan::whereMonth('created_at', $bulanIni)->whereYear('created_at', $tahunIni)->where('status','terima')->get();
        foreach ($PermohonanBulanIni as $items) {
            $pendapatanBulan = $items->SubJenisCiptaan->jenisCiptaan->biayaJenisCiptaan->where('jenis_permohonan_id', $items->jenisPermohonan->id)->first()->biaya + $pendapatanBulan;
        }
        
        $pendapatanBulanSebelumnya = 0;
        $PermohonanBulanSebelumnya = Permohonan::whereMonth('created_at', $bulanSebelumnya)->whereYear('created_at', $tahunIni)->where('status','terima')->get();

        foreach ($PermohonanBulanSebelumnya as $items) {
            $pendapatanBulanSebelumnya = $items->SubJenisCiptaan->jenisCiptaan->biayaJenisCiptaan->where('jenis_permohonan_id', $items->jenisPermohonan->id)->first()->biaya + $pendapatanBulanSebelumnya;
        }
        
        //cek division by zero
        if ($pendapatanBulanSebelumnya == 0 || $pendapatanBulan == 0 ) {
            $perbandinganBulan = 100;
        }else{
            $perbandinganBulan = $pendapatanBulan / $pendapatanBulanSebelumnya * 100 ;
        }


        if ($pendapatanBulan < $pendapatanBulanSebelumnya) {
            $perbandinganBulan = '-' . $perbandinganBulan;
        }else{
            $perbandinganBulan = '+' . $perbandinganBulan;
        }

        // menghitung jumlah laporan untuk chart ke 2

        $arrBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        $arrBulanDiterima = [];
        foreach ($arrBulan as $items) {
            $countTerima2 = Permohonan::whereMonth('created_at', $items)->whereYear('created_at', $tahunIni )->where('status','terima')->count();
            array_push($arrBulanDiterima, $countTerima2);
        }
        
        $arrBulanDiproses = [];
        foreach ($arrBulan as $items) {
            $countProses2 = Permohonan::whereMonth('created_at', $items)->whereYear('created_at', $tahunIni )->where('status','proses')->count();
            array_push($arrBulanDiproses, $countProses2);
        }

        $arrBulanDitolak = [];
        foreach ($arrBulan as $items) {
            $countTolak2 = Permohonan::whereMonth('created_at', $items)->whereYear('created_at', $tahunIni )->where('status','tolak')->count();
            array_push($arrBulanDitolak, $countTolak2);
        }


        if (Auth::user()->level == 'admin') {
            $datas = Permohonan::orderBy('created_at','DESC')->take(5)->get();
        }else{
            $datas = Permohonan::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->take(5)->get();
        }

        return view('admin.dashboard', compact('all','datas','count','pendapatanTahun',
        'pendapatanBulan','perbandinganTahun', 'perbandinganBulan', 'arrBulanDiterima',
        'arrBulanDiproses', 'arrBulanDitolak', 'tahunIni'));
    }
}
