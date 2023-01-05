<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class PenelusuranController extends Controller
{
    public function index(Request $request)
    {
        $getStatus = $request->get('status', ['terima', 'tolak', 'proses']);
        $getSearch = $request->get('search');

        $datas = Permohonan::latest()->whereIn('status', $getStatus)->paginate(5);
        
        if ($getSearch) {
            $datas = Permohonan::latest()->where('judul_ciptaan', 'like', '%'.$getSearch.'%')->orWhere('nomor_permohonan', 'like', '%'.$getSearch.'%')->whereIn('status', $getStatus)->paginate(5);            
        }

        return view('penelusuran', compact('datas', 'request', 'getStatus', 'getSearch'));
    }
}
