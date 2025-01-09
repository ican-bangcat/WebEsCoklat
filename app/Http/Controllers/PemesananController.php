<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\DetailPemesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    public function checkout(Request $request)
    {
        // Buat pemesanan baru
        $pemesanan = Pemesanan::create([
            'id_user' => Auth::id(), // ID user yang sedang login
            'tanggal_pemesanan' => now(), // Isi dengan tanggal dan waktu sekarang
            'status' => 'Pending', // Default status
            'total_harga' => $request->input('total_harga'), // Total harga dari keranjang
            'bukti_pembayaran' => null, // Masih kosong
        ]);

        // Ambil data keranjang pengguna
        $cartItems = Cart::where('id_user', Auth::id())->get();

        // Simpan setiap item keranjang ke tabel detail_pemesanans dan kurangi stok produk
        foreach ($cartItems as $item) {
            // Buat detail pemesanan
            DetailPemesanan::create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_produk' => $item->id_produk,
                'jumlah' => $item->jumlah,
                'harga_total' => $item->jumlah * $item->produk->harga, // Harga total untuk produk ini
            ]);

            // Kurangi stok produk
            $produk = Produk::find($item->id_produk);
            if ($produk) {
                $produk->stok -= $item->jumlah;
                $produk->save();
            }
        }

        // Hapus data keranjang setelah checkout
        Cart::where('id_user', Auth::id())->delete();

        return redirect()->route('checkout.show')->with('success', 'Checkout berhasil!');
    }


    // public function checkout(Request $request)
    // {
    //     $pemesanan = Pemesanan::create([
    //         'id_user' => Auth::id(), // ID user yang sedang login
    //         'tanggal_pemesanan' => now(), // Isi dengan tanggal dan waktu sekarang
    //         'status' => 'Pending', // Default status
    //         'total_harga' => $request->input('total_harga'), // Total harga dari keranjang
    //         'bukti_pembayaran' => null, // Masih kosong
    //     ]);

    //     // Logika lainnya seperti memindahkan data dari keranjang ke detail_pemesanan

    //     return redirect()->route('checkout.show')->with('success', 'Checkout berhasil!');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();

        $data = Pemesanan::where('id_user', $id)->get();
        // dd($data);
        return view('pemesanan_index', compact('data'));
    }
    // public function indexAdmin()
    // {
    //     // Ambil semua pemesanan dengan relasi user dan detail pemesanan
    //     $pemesanan = Pemesanan::with('user', 'detailPemesanan')->get();

    //     // Kirim data pemesanan ke view
    //     return view('admin', compact('pemesanan'));
    // }

    // public function uploadBuktiPembayaran(Request $request, $id)
    // {
    //     // Validasi file
    //     $request->validate([
    //         'bukti_pembayaran' => 'required|mimes:jpg,jpeg,png,pdf|max:10000',
    //     ]);

    //     // Temukan data pemesanan berdasarkan ID
    //     $pemesanan = Pemesanan::findOrFail($id);

    //     // Buat folder 'bukti_pembayaran' jika belum ada
    //     if (!Storage::exists('public/bukti_pembayaran')) {
    //         Storage::makeDirectory('public/bukti_pembayaran');
    //     }

    //     // Upload file
    //     // if ($request->hasFile('bukti_pembayaran')) {
    //     //     $file = $request->file('bukti_pembayaran');
    //     //     $filename = time() . '_' . $file->getClientOriginalName();
    //     //     $filePath = $file->storeAs('bukti_pembayaran', $filename, 'public');

    //     //     // Simpan path file ke database
    //     //     $pemesanan->bukti_pembayaran = $filePath;
    //     //     $pemesanan->save();
    //     // }
    //     if ($request->hasFile('bukti_pembayaran')) {
    //         // Hapus foto lama jika ada
    //         if ($pemesanan->bukti_pembayaran) {
    //             Storage::disk('public')->delete($pemesanan->bukti_pembayaran);
    //         }

    //         // Simpan foto baru
    //         $pemesanan->bukti_pembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
    //         $pemesanan->save();

    //     }

    //     // Simpan perubahan

    //     // Redirect kembali dengan pesan sukses
    //     return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah!');
    // }
    public function uploadBuktiPembayaran(Request $request, $id)
    {
        // Validasi file
        $request->validate([
            'bukti_pembayaran' => 'required|mimes:jpg,jpeg,png,pdf|max:10000',
        ]);

        // Temukan data pemesanan berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($id);

        // Hapus bukti pembayaran lama jika ada
        if ($pemesanan->bukti_pembayaran) {
            Storage::disk('public')->delete($pemesanan->bukti_pembayaran);
        }

        // Simpan file yang diunggah ke folder 'bukti_pembayaran'
        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        // Simpan path file ke database
        $pemesanan->bukti_pembayaran = $path;
        $pemesanan->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah!');
    }

    public function updateStatus(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status = $request->input('status');
        $pemesanan->save();

        return redirect()->back()->with('success', 'Status pemesanan berhasil diperbarui.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
