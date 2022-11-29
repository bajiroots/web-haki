<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPermohonan;

use Illuminate\Support\Facades\Auth;

class JenisPermohonanController extends Controller
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

        $datas = JenisPermohonan::all();

        return view("admin.jenis_permohonan.index", compact('datas'));
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
        return view("admin.jenis_permohonan.create");
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
        JenisPermohonan::create([
            'nama_jenis_permohonan' => $request->jenis_permohonan,
        ]);

        return redirect(route('jenis_permohonan.index'))->with('success','Jenis Permohonan Berhasil Ditambahkan !');
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
        $data = JenisPermohonan::find($id);

        return view("admin.jenis_permohonan.edit", compact('data'));
        
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
        $data = JenisPermohonan::find($id);
        $data->update([
            'nama_jenis_permohonan' => $request->jenis_permohonan,
        ]);

        return redirect(route('jenis_permohonan.index'))->with('success','Jenis Permohonan Berhasil Diubah !');
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
        $data = JenisPermohonan::find($id);
        $data->delete();

        return redirect(route('jenis_permohonan.index'))->with('success','Jenis Permohonan Berhasil Dihapus !');
    }
}
