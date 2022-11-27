<?php
namespace App\Helpers;

use App\Models\Permohonan;
use App\Models\Provinsi;

class Helper {

  public static function generateNoPermohonan(){
    $p = Permohonan::orderBy('nomor_permohonan','DESC')->first();
    $kd = "PMN-000000";
    if($p){
        $kd = $p->nomor_permohonan;
    }

    return ++$kd;
  }

  public static function provinsi(){
    $p = Provinsi::all();
    return $p;
  }

}