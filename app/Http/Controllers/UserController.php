<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Imports\UsersImport;
use Excel;

use App\Helpers\Helper;

class UserController extends Controller
{

    public function index()
    {
        $datas = User::all();

        $title = "Pengguna";
        $url = "user";
        $menu = "Master Data";
        return view('admin.user.index', compact('title', 'url', 'menu', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Pengguna";
        $url = "user";
        $menu = "Master Data";
        return view('admin.user.create', compact('title', 'url', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	if ($request->password != $request->cpassword) {
    		return redirect()->back()->with('error', 'Mohon Periksa Kembali Password Yang Anda Masukkan');
        }
        
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'no_ktp' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'kode_pos' => ['required', 'string', 'max:255'],
            'jenis_Kelamin' => ['required', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'no_ktp' => $request->no_ktp,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'kota_id' => $request->kota,
            'jenis_kelamin' => $request->jenis_Kelamin,
            'password' => Hash::make($request->password),
        ]);


        return redirect(route('user.index'))->with('success', 'Data Berhasil Ditambah');
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

        $data = User::find($id); 
        $kota = Kota::where('provinsi_id', $data->kota->provinsi_id)->get(); 

        $title = "Pengguna";
        $url = "user";
        $menu = "Master Data";
        return view('admin.user.edit', compact('title', 'url', 'menu', 'data', 'kota'));
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

        $user = User::find($id);
        $old = $user->toArray();
        if ($user->username != $request->username ) {
            $this->validate($request, [
                'username' => 'required|unique:users'
            ]);
        }

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'kode_pos' => ['required', 'string', 'max:255'],
            'jenis_Kelamin' => ['required', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($request->password != NULL && $request->cpassword != NULL) {
            
            if ($request->password != $request->cpassword) {
                $this->validate($request, [
                    'password' => 'required',
                    'cpassword' => 'required|same:password',
                ]);
            }else{
                $user->perangkatDaerahUser()->delete();
                
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'username' => $request->username,
                    'no_ktp' => $request->no_ktp,
                    'tgl_lahir' => $request->tgl_lahir,
                    'alamat' => $request->alamat,
                    'kode_pos' => $request->kode_pos,
                    'kota_id' => $request->kota,
                    'jenis_kelamin' => $request->jenis_Kelamin,
                    'password' => Hash::make($request->password),
                ]);

                return redirect(route('user.index'))->with('success', 'Data Berhasil Diubah');
            }           

        }else{

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'no_ktp' => $request->no_ktp,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos,
                'kota_id' => $request->kota,
                'jenis_kelamin' => $request->jenis_Kelamin,
            ]);

            return redirect(route('user.index'))->with('success', 'Data Berhasil Diubah');
        }


        

        return redirect(route('user.index'))->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {    
            $admin = User::find($id);            
            $nama_admin = $admin->nama_admin;
            $admin->delete();

           
        } catch (\Illuminate\Database\QueryException $e) {
            if($e->errorInfo[1] == 1451){
                return redirect(route('user.index'))->with('gagal', 'Data Masih Digunakan');
            }  
        }

        return redirect(route('user.index'))->with('success', 'Data Berhasil Dihapus');
    }

}
