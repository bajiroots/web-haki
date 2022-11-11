<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCiptaan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jenisPermohonan()
    {
        return $this->belongsTo(JenisPermohonan::class);
    }
}
