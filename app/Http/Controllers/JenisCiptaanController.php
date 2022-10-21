<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisCiptaan;

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
        return view("admin.jenis_ciptaan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
}
