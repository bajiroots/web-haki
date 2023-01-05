<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permohonan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function SubJenisCiptaan(){
        return $this->belongsTo(SubJenisCiptaan::class);
    }

    public function pencipta(){
        return $this->hasMany(Pencipta::class);
    }

    public function jenisPermohonan(){
        return $this->belongsTo(JenisPermohonan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
