<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
        $user = User::find($id);
        $prov = Provinsi::all();
        $kota = Kota::where('provinsi_id', $user->kota->provinsi_id)->get();
        

        return view("admin.profil.profil_edit", compact('user', 'prov', 'kota'));
        
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

        // dd($request);

        $user = User::find($id);

        
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

                return redirect(route('dashboard-admin'))->with('success', 'Data Berhasil Diubah');
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

            return redirect(route('dashboard-admin'))->with('success', 'Profil Berhasil Diubah');
        }


        

        return redirect(route('dashboard-admin'))->with('success', 'Profil Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
