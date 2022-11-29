<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubJenisCiptaan;
use App\Models\JenisCiptaan;

use Illuminate\Support\Facades\Auth;

class SubJenisCiptaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }
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
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }
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
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }
        SubJenisCiptaan::create([
            'jenis_ciptaan_id' => $request->jenis_ciptaan,
            'nama_sub_jenis_ciptaan' => $request->sub_jenis_ciptaan,
        ]);

        return redirect(route('sub_jenis_ciptaan.index'))->with('success','Sub Jenis Ciptaan Berhasil Ditambahkan !');
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
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }
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
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }
        $data = SubJenisCiptaan::find($id);
        $data->update([
            'jenis_ciptaan_id' => $request->jenis_ciptaan,
            'nama_sub_jenis_ciptaan' => $request->sub_jenis_ciptaan,
        ]);

        return redirect(route('sub_jenis_ciptaan.index'))->with('success','Sub Jenis Ciptaan Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->level != 'admin'){
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Ke Menu Ini');
        }
        $data = SubJenisCiptaan::find($id);
        $data->delete();

        return redirect(route('sub_jenis_ciptaan.index'))->with('success','Sub Jenis Ciptaan Berhasil Dihapus !');
    }
}
