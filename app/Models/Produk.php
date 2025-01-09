<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    protected $table = 'produk';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class); // If you want to retrieve all carts for a product
    }
    public function detailPemesanan()
{
    return $this->hasMany(DetailPemesanan::class, 'produk_id');
}

    
    use HasFactory;

    // Add 'user_id' to the fillable property
    protected $fillable = [
        'user_id',      
        'nama_produk',
        'harga',
        'deskripsi',
        'stok',
        'foto_produk',
    ];
}
