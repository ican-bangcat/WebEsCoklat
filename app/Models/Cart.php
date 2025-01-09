<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id_keranjang'; // Menentukan primary key yang sesuai
    public $incrementing = true; // Jika menggunakan auto-increment

    public function produk()
{
    return $this->belongsTo(Produk::class, 'id_produk', 'id');
}

    public function User()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
}
