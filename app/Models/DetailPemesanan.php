<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_detail_pemesanan';

    protected $fillable = [
        'id_pemesanan',
        'id_produk',
        'jumlah',
        'harga_total',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
