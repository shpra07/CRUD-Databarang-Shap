<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kode', 'nama', 'jenis_id', 'harga', 'stok',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}


