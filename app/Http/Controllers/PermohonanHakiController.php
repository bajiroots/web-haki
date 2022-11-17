<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\JenisCiptaan;
use App\Models\JenisPermohonan;
use App\Models\SubJenisCiptaan;
use App\Models\BiayaJenisCiptaan;
use App\Models\Provinsi;
use App\Models\Kota;

class PermohonanHakiController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Permohonan::all();
        

        return view("admin.permohonan_haki.index", compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisCiptaan = JenisCiptaan::all();
        $jenisPermohonan = JenisPermohonan::all();
        $provinsis = Provinsi::all();

        return view("admin.permohonan_haki.create", compact("jenisCiptaan", "jenisPermohonan", "provinsis"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        JenisCiptaan::create([
            'nama_jenis_ciptaan' => $request->jenis_ciptaan,
            'biaya' => $request->biaya,
        ]);

        return redirect(route('jenis_ciptaan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JenisCiptaan::find($id);

        return view("admin.jenis_ciptaan.edit", compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = JenisCiptaan::find($id);
        $data->update([
            'nama_jenis_ciptaan' => $request->jenis_ciptaan,
            'biaya' => $request->biaya,
        ]);

        return redirect(route('jenis_ciptaan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JenisCiptaan::find($id);
        $data->delete();

        return redirect(route('jenis_ciptaan.index'));
    }

    public function getSubJenisCiptaan($jenis_permohonan_id, $jenis_ciptaan_id)
    {
        $sub_jenis_ciptaan = SubJenisCiptaan::where('jenis_ciptaan_id', $jenis_ciptaan_id)->get();
        $biaya = BiayaJenisCiptaan::where('jenis_permohonan_id', $jenis_permohonan_id)->where('jenis_ciptaan_id', $jenis_ciptaan_id)->first();

        $data = [
            'sub_jenis_ciptaan' => $sub_jenis_ciptaan,
            'biaya' => $biaya,
        ];
        
        return response()->json([
            'status' => "success",
            'data' => $data
        ]);
    }

    public function getKota($provinsi_id)
    {
        $data = Kota::where('provinsi_id', $provinsi_id)->get();
        
        return response()->json([
            'status' => "success",
            'data' => $data
        ]);
    }
}
