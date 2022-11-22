<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function SubJenisCiptaan(){
        return $this->belongsTo(SubJenisCiptaan::class);
    }

    public function pencipta(){
        return $this->hasMany(Pencipta::class);
    }
}
