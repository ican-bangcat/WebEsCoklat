<?php

namespace App\Http\Controllers;

use id;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['produk'] = Produk::all();
        return view('produk_index', $data);
    }
    public function indexCustomer()
    {
        $data['produk'] = Produk::all();
        
        return view('customer_produk_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('produk_create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_produk')) {
            $fotoPath = $request->file('foto_produk')->store('produk', 'public');
        }

        Produk::create([
            'user_id' => $request->user_id,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'foto_produk' => $fotoPath,
        ]);

        // return redirect()->route('produk')->with('flash_notification', [
        //     'message' => 'Produk berhasil ditambahkan!',
        // ]);
        // Redirect kembali dengan pesan sukses
        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Tampilkan view edit dan kirimkan data produk
        return view('produk_edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file foto
        ]);

        // Ambil produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Update data produk
        $produk->nama_produk = $request->input('nama_produk');
        $produk->harga = $request->input('harga');
        $produk->stok = $request->input('stok');
        $produk->deskripsi = $request->input('deskripsi');

        // Cek apakah ada file foto yang di-upload
        if ($request->hasFile('foto_produk')) {
            // Hapus foto lama jika ada
            if ($produk->foto_produk) {
                Storage::disk('public')->delete($produk->foto_produk);
            }

            // Simpan foto baru
            $produk->foto_produk = $request->file('foto_produk')->store('produk', 'public');
        }

        // Simpan perubahan
        $produk->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Hapus foto produk jika ada
        if ($produk->foto_produk) {
            Storage::disk('public')->delete($produk->foto_produk);
        }

        // Hapus produk dari database
        $produk->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus.');
    }
}
