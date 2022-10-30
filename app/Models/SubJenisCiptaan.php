<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubJenisCiptaan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jenisCiptaan()
    {
        return $this->belongsTo(JenisCiptaan::class);
    }
}
