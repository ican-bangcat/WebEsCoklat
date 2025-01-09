<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user_id = 3; // ID user yang sudah ada

        DB::table('produk')->insert([
            [
                'user_id' => $user_id,
                'nama_produk' => 'Roselatte Original',
                'harga' => 8000,
                'deskripsi' => 'Minuman Roselatte dengan cita rasa khas.',
                'stok' => 100,
            ],
            [
                'user_id' => $user_id,
                'nama_produk' => 'Coklat Mantap Original',
                'harga' => 8000,
                'deskripsi' => 'Minuman coklat dengan rasa otentik.',
                'stok' => 100,
            ],
            [
                'user_id' => $user_id,
                'nama_produk' => 'Semangka Latte with Topping',
                'harga' => 12000,
                'deskripsi' => 'Minuman latte dengan rasa semangka segar.',
                'stok' => 100,
            ],
            
        ]);
    }
}
