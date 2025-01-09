<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    protected $casts = [
        'tanggal_pemesanan' => 'datetime',
    ];
    use HasFactory;

    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_user',
        'tanggal_pemesanan',
        'status',
        'total_harga',
        'bukti_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function detailPemesanan()
{
    return $this->hasMany(DetailPemesanan::class, 'id_pemesanan');
}

}
