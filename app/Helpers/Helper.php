<?php
namespace App\Helpers;

use App\Models\Permohonan;

class Helper {

  public static function generateNoPermohonan(){
    $p = Permohonan::orderBy('nomor_permohonan','DESC')->first();
    $kd = "PMN-000000";
    if($p){
        $kd = $p->nomor_permohonan;
    }

    return ++$kd;
  }

}