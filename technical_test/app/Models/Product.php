<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function productBarang()
    {
        return $this->belongsTo(DaftarProduct::class, 'nama_barang_id');
    }
}
