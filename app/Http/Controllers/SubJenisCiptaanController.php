<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubJenisCiptaan;
use App\Models\JenisCiptaan;

class SubJenisCiptaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = SubJenisCiptaan::all();

        return view("admin.sub_jenis_ciptaan.index", compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $dataCiptaans = JenisCiptaan::all();

        return view("admin.sub_jenis_ciptaan.create", compact('dataCiptaans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubJenisCiptaan::create([
            'jenis_ciptaan_id' => $request->jenis_ciptaan,
            'nama_sub_jenis_ciptaan' => $request->sub_jenis_ciptaan,
        ]);

        return redirect(route('sub_jenis_ciptaan.index'));
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
        $dataCiptaans = JenisCiptaan::all();

        $dataSubJenisCiptaans = SubJenisCiptaan::find($id);

        return view("admin.sub_jenis_ciptaan.edit", compact('dataCiptaans', 'dataSubJenisCiptaans'));
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
        $data = SubJenisCiptaan::find($id);
        $data->update([
            'jenis_ciptaan_id' => $request->jenis_ciptaan,
            'nama_sub_jenis_ciptaan' => $request->sub_jenis_ciptaan,
        ]);

        return redirect(route('sub_jenis_ciptaan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SubJenisCiptaan::find($id);
        $data->delete();

        return redirect(route('sub_jenis_ciptaan.index'));
    }
}
