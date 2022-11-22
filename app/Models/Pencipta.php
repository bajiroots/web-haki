<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencipta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Kota()
    {
        return $this->belongsTo(Kota::class);
    }
}
