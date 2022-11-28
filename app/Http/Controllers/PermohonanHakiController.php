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

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Pencipta;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'jenis_permohonan' => 'required',
            'jenis_ciptaan' => 'required',
            'sub_jenis_ciptaan' => 'required',
            'judul' => 'required',
            'uraian' => 'required',
            'tanggal' => 'required',
            'kota_pertama_diumumkan' => 'required',
            'namaPencipta' => 'required|array',
            'alamatPencipta' => 'required|array',
            'kodePosPencipta' => 'required|array',
            'kotaPencipta' => 'required|array',
            'emailPencipta' => 'required|array',
            'noTelpPencipta' => 'required|array',
            'ktp' => 'required|mimes:pdf',
            'surat_pernyataan' => 'required|mimes:pdf',
            'contoh_ciptaan' => 'required',
            'bukti_bayar' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
        try {
            DB::beginTransaction();

            $fileNameBuktiBayar = null;
            $fileNameKtp = null;
            $fileNameSuratPernyataan = null;
            $fileNameContohCiptaan = null;
            $fileNameBuktiPengalihan = null;

            if ($request->bukti_bayar) {
                $directory = 'lampiran_permohonan/bukti_bayar';
                $fileNameBuktiBayar = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->bukti_bayar->getClientOriginalName();
                
                $path = $request->bukti_bayar->storeAs(
                    'public', $fileNameBuktiBayar
                );
            }

            if ($request->ktp) {
                $directory = 'lampiran_permohonan/ktp';
                $fileNameKtp = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->ktp->getClientOriginalName();
                
                $path = $request->ktp->storeAs(
                    'public', $fileNameKtp
                );
            }

            if ($request->surat_pernyataan) {
                $directory = 'lampiran_permohonan/surat_pernyataan';
                $fileNameSuratPernyataan = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->surat_pernyataan->getClientOriginalName();
                
                $path = $request->surat_pernyataan->storeAs(
                    'public', $fileNameSuratPernyataan
                );
            }

            if ($request->contoh_ciptaan) {
                $directory = 'lampiran_permohonan/contoh_ciptaan';
                $fileNameContohCiptaan = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->contoh_ciptaan->getClientOriginalName();
                
                $path = $request->contoh_ciptaan->storeAs(
                    'public', $fileNameContohCiptaan
                );
            }

            if ($request->bukti_pengalihan) {
                $directory = 'lampiran_permohonan/bukti_pengalihan';
                $fileNameBuktiPengalihan = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->bukti_pengalihan->getClientOriginalName();
                
                $path = $request->bukti_pengalihan->storeAs(
                    'public', $fileNameBuktiPengalihan
                );
            }

            $permohonan = Permohonan::create([
                'user_id' => Auth::user()->id,
                'jenis_permohonan_id' => $request->jenis_permohonan,
                'sub_jenis_ciptaan_id' => $request->sub_jenis_ciptaan,
                'nomor_permohonan' => Helper::generateNoPermohonan(),
                'tgl_pengajuan' => $request->tanggal,
                'judul_ciptaan' => $request->judul,
                'deskripsi' => $request->uraian,
                'kota_pertama_diumumkan' => $request->kota_pertama_diumumkan,
                'foto_bukti_bayar_wajib' => $fileNameBuktiBayar,
                'foto_ktp_wajib' => $fileNameKtp,
                'surat_pernyataan_wajib' => $fileNameSuratPernyataan,
                'contoh_ciptaan_wajib' => $fileNameContohCiptaan,
                'bukti_pengalihan_hak_cipta' => $fileNameBuktiPengalihan,
                'contoh_ciptaan_link' => $request->contoh_ciptaan_link ?? null,
            ]);

            for ($i=0; $i < count($request->namaPencipta); $i++) { 
                Pencipta::create([
                    'permohonan_id' => $permohonan->id,
                    'kota_id' => $request->kotaPencipta[$i],
                    'nama' => $request->namaPencipta[$i],
                    'email' => $request->emailPencipta[$i],
                    'no_telp' => $request->noTelpPencipta[$i],
                    'alamat' => $request->alamatPencipta[$i],
                    'kode_pos' => $request->kodePosPencipta[$i],
                ]);
            }

            DB::commit();

            return redirect(route('permohonan_haki.index'))->with('success','Pemohonan Hak Cipta Anda Berhasil Dikirim !');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()
                    ->withErrors($th->getMessage())
                    ->withInput()
                    ->with('error', $th);
        }
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
        $data = Permohonan::find($id);

        $jenisPermohonan = JenisPermohonan::all();
        $jenisCiptaan = JenisCiptaan::all();
        $subJenisCiptaan = SubJenisCiptaan::where('jenis_ciptaan_id', $data->subJenisCiptaan->jenis_ciptaan_id)->get();
        $provinsis = Provinsi::all();

        // dd($data->SubJenisCiptaan->jenisCiptaan);
        // dd($data->SubJenisCiptaan->jenisCiptaan->biayaJenisCiptaan->where('jenis_permohonan_id', $data->jenisPermohonan->id)->first()->biaya);
        
        return view("admin.permohonan_haki.show", compact("data", "jenisCiptaan", "jenisPermohonan", "provinsis", "subJenisCiptaan"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Permohonan::find($id);

        $jenisPermohonan = JenisPermohonan::all();
        $jenisCiptaan = JenisCiptaan::all();
        $subJenisCiptaan = SubJenisCiptaan::where('jenis_ciptaan_id', $data->subJenisCiptaan->jenis_ciptaan_id)->get();
        $provinsis = Provinsi::all();

        return view("admin.permohonan_haki.edit", compact("data", "jenisCiptaan", "jenisPermohonan", "provinsis", "subJenisCiptaan"));
        
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
        $validator = Validator::make($request->all(), [
            'jenis_permohonan' => 'required',
            'jenis_ciptaan' => 'required',
            'sub_jenis_ciptaan' => 'required',
            'judul' => 'required',
            'uraian' => 'required',
            'tanggal' => 'required',
            'kota_pertama_diumumkan' => 'required',
            'namaPencipta' => 'required|array',
            'alamatPencipta' => 'required|array',
            'kodePosPencipta' => 'required|array',
            'kotaPencipta' => 'required|array',
            'emailPencipta' => 'required|array',
            'noTelpPencipta' => 'required|array',
            'ktp' => 'required|mimes:pdf',
            'surat_pernyataan' => 'required|mimes:pdf',
            'contoh_ciptaan' => 'required',
            'bukti_bayar' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
        try {
            DB::beginTransaction();

            $permohonan = Permohonan::find($id);

            $fileNameBuktiBayar = $permohonan->foto_bukti_bayar_wajib;
            $fileNameKtp = $permohonan->foto_ktp_wajib;
            $fileNameSuratPernyataan = $permohonan->surat_pernyataan_wajib;
            $fileNameContohCiptaan = $permohonan->contoh_ciptaan_wajib;
            $fileNameBuktiPengalihan = $permohonan->bukti_pengalihan_hak_cipta;

            if ($request->bukti_bayar) {
                $directory = 'lampiran_permohonan/bukti_bayar';
                $fileNameBuktiBayar = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->bukti_bayar->getClientOriginalName();
                
                $path = $request->bukti_bayar->storeAs(
                    'public', $fileNameBuktiBayar
                );
            }

            if ($request->ktp) {
                $directory = 'lampiran_permohonan/ktp';
                $fileNameKtp = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->ktp->getClientOriginalName();
                
                $path = $request->ktp->storeAs(
                    'public', $fileNameKtp
                );
            }

            if ($request->surat_pernyataan) {
                $directory = 'lampiran_permohonan/surat_pernyataan';
                $fileNameSuratPernyataan = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->surat_pernyataan->getClientOriginalName();
                
                $path = $request->surat_pernyataan->storeAs(
                    'public', $fileNameSuratPernyataan
                );
            }

            if ($request->contoh_ciptaan) {
                $directory = 'lampiran_permohonan/contoh_ciptaan';
                $fileNameContohCiptaan = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->contoh_ciptaan->getClientOriginalName();
                
                $path = $request->contoh_ciptaan->storeAs(
                    'public', $fileNameContohCiptaan
                );
            }

            if ($request->bukti_pengalihan) {
                $directory = 'lampiran_permohonan/bukti_pengalihan';
                $fileNameBuktiPengalihan = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->bukti_pengalihan->getClientOriginalName();
                
                $path = $request->bukti_pengalihan->storeAs(
                    'public', $fileNameBuktiPengalihan
                );
            }

            $permohonan->update([
                'user_id' => Auth::user()->id,
                'jenis_permohonan_id' => $request->jenis_permohonan,
                'sub_jenis_ciptaan_id' => $request->sub_jenis_ciptaan,
                'nomor_permohonan' => Helper::generateNoPermohonan(),
                'tgl_pengajuan' => $request->tanggal,
                'judul_ciptaan' => $request->judul,
                'deskripsi' => $request->uraian,
                'kota_pertama_diumumkan' => $request->kota_pertama_diumumkan,
                'foto_bukti_bayar_wajib' => $fileNameBuktiBayar,
                'foto_ktp_wajib' => $fileNameKtp,
                'surat_pernyataan_wajib' => $fileNameSuratPernyataan,
                'contoh_ciptaan_wajib' => $fileNameContohCiptaan,
                'bukti_pengalihan_hak_cipta' => $fileNameBuktiPengalihan,
                'contoh_ciptaan_link' => $request->contoh_ciptaan_link ?? null,
            ]);

            $permohonan->pencipta()->delete();
            for ($i=0; $i < count($request->namaPencipta); $i++) { 
                Pencipta::create([
                    'permohonan_id' => $permohonan->id,
                    'kota_id' => $request->kotaPencipta[$i],
                    'nama' => $request->namaPencipta[$i],
                    'email' => $request->emailPencipta[$i],
                    'no_telp' => $request->noTelpPencipta[$i],
                    'alamat' => $request->alamatPencipta[$i],
                    'kode_pos' => $request->kodePosPencipta[$i],
                ]);
            }

            DB::commit();

            return redirect(route('permohonan_haki.index'))->with('success','Pemohonan Hak Cipta Anda Berhasil Diubah !');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()
                    ->withErrors($th->getMessage())
                    ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Permohonan::find($id);
        $data->pencipta()->delete();
        $data->delete();

        return redirect(route('permohonan_haki.index'));
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

    public function uploadSertifikat(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'no_sertifikat' => 'required',
            'sertifikat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
                }
        
        try {
            DB::beginTransaction();

            $permohonan = Permohonan::find($id);

            $fileNameSertifikat = $permohonan->foto_sertifikat;

            if ($request->sertifikat) {
                $directory = 'lampiran_permohonan/sertifikat';
                $fileNameSertifikat = $directory .'/'. date('Y-m-d-H-i-s') .'-'. $request->sertifikat->getClientOriginalName();
                
                $path = $request->sertifikat->storeAs(
                    'public', $fileNameSertifikat
                );
            }

            $permohonan->update([
                'foto_sertifikat' => $fileNameSertifikat,
                'no_sertifikat' => $request->no_sertifikat,
                'status' => "terima",
            ]);

            DB::commit();

            return redirect(route('permohonan_haki.index'))->with('success','Sertifikat Berhasil Di Upload !');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()
                    ->withErrors($th->getMessage())
                    ->withInput();
        }
    }
}
