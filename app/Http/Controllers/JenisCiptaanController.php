<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisCiptaan;
use App\Models\JenisPermohonan;

class JenisCiptaanController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = JenisCiptaan::all();

        return view("admin.jenis_ciptaan.index", compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_permohonan = JenisPermohonan::all();
        return view("admin.jenis_ciptaan.create", compact('jenis_permohonan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cegah data duplikat
        $cek_duplikat = JenisCiptaan::where('nama_jenis_ciptaan', $request->jenis_ciptaan)->where('jenis_permohonan_id', $request->jenis_permohonan_id)->first();
        if ($cek_duplikat) {
            $cek_duplikat->update([
                'nama_jenis_ciptaan' => $request->jenis_ciptaan,
                'jenis_permohonan_id' => $request->jenis_permohonan_id,
                'biaya' => $request->biaya,
            ]);
        }else{
            JenisCiptaan::create([
                'nama_jenis_ciptaan' => $request->jenis_ciptaan,
                'jenis_permohonan_id' => $request->jenis_permohonan_id,
                'biaya' => $request->biaya,
            ]);
        }

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
        $jenis_permohonan = JenisPermohonan::all();
        $data = JenisCiptaan::find($id);

        return view("admin.jenis_ciptaan.edit", compact('data', 'jenis_permohonan'));
        
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
            'jenis_permohonan_id' => $request->jenis_permohonan_id  ,
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
}
