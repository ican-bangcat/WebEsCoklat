<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart(Request $request, $id)
    {
        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Ambil cart dari session
        $cart = session()->get('cart', []);

        // Dapatkan ID user yang sedang login (asumsikan sudah ada proses autentikasi)
        // $userId = auth()->id();
        $userId = $request->input('user_id'); // Ambil user_id dari form
        // Cek jika produk sudah ada di cart, tambah jumlahnya
        $existingCart = DB::table('carts')
            ->where('id_user', $userId)
            ->where('id_produk', $id)
            ->first();

        if ($existingCart) {
            // Update jumlah produk yang ada di cart
            DB::table('carts')
                ->where('id_user', $userId)
                ->where('id_produk', $id)
                ->update([
                    'jumlah' => $existingCart->jumlah + 1,
                    'updated_at' => now()
                ]);
        } else {
            // Jika produk belum ada di cart, tambahkan produk ke cart
            DB::table('carts')->insert([
                'id_user' => $userId,
                'id_produk' => $id,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditamvahkan ke keranjang!');
    }
    public function showCart(Request $request)
    {
        // Get the user_id from the request, or fallback to a session or other source

        // if (!$userId) {
        //     return redirect()->route('home')->with('error', 'User ID is required.');
        // }
        $id = Auth::id();
        // Retrieve the cart items for the specific user
        $data = Cart::where('id_user', $id)->get();
        $total = 0;
        foreach ($data as $item) {
            if ($item->produk) { // Periksa apakah produk tidak null
                $total += $item->produk->harga * $item->jumlah;
            } else {
                // Tangani kasus di mana produk tidak ditemukan
                echo "Produk dengan ID {$item->id_produk} tidak ditemukan.";
            }
        }

        // // Fixed shipping cost
        // $shipping = 3000;
        // $total = $subtotal + $shipping;

        return view('cart_index', compact('data', 'total'));
    }

    // public function showCart()
    // {
    //     $cartItems = DB::table('carts')
    //         ->join('produk', 'carts.id_produk', '=', 'produk.id')
    //         ->where('carts.id_user', auth()->id()) // Assuming you have user authentication
    //         ->select('carts.id_keranjang', 'produk.nama_produk', 'produk.harga', 'produk.foto_produk', 'carts.jumlah')
    //         ->get();

    //     $subtotal = 0;
    //     foreach ($cartItems as $item) {
    //         $subtotal += $item->harga * $item->jumlah;
    //     }

    //     // Fixed shipping cost
    //     $shipping = 3000;
    //     $total = $subtotal + $shipping;

    //     return view('cart_index', compact('cartItems', 'subtotal', 'shipping', 'total'));
    //     // $cart = session()->get('cart', []);
    //     // $subtotal = 0;

    //     // foreach ($cart as $item) {
    //     //     $subtotal += $item['price'] * $item['quantity'];
    //     // }

    //     // // Fixed shipping cost
    //     // $shipping = 3000;
    //     // $total = $subtotal + $shipping;

    //     // return view('cart_index', compact('cart', 'subtotal', 'shipping', 'total'));
    // }
    public function updateCart(Request $request, $id_keranjang, $action)
    {
        $cartItem = Cart::findOrFail($id_keranjang); // Ambil data keranjang berdasarkan ID

        // Validasi dan update kuantitas berdasarkan action
        if ($action === 'increase') {
            $cartItem->jumlah++;
        } elseif ($action === 'decrease' && $cartItem->jumlah > 1) {
            $cartItem->jumlah--;
        } else {
            return response()->json(['error' => 'Invalid action'], 400);
        }

        $cartItem->save();
        Log::info('Cart item updated', [
            'id' => $cartItem->id,
            'newQuantity' => $cartItem->jumlah
        ]);

        // Kalkulasi harga total
        $product = $cartItem->produk;
        $newTotalPrice = $cartItem->jumlah * $product->harga;

        return response()->json([
            'newQuantity' => $cartItem->jumlah,
            'newTotalPrice' => number_format($newTotalPrice, 0, ',', '.'),
        ]);
    }

    // public function updateCart(Request $request, $id)
    // {

    //     $cartItem = Cart::findOrFail($id); // Ambil data keranjang berdasarkan ID
    //     $newQuantity = $request->input('quantity'); // Ambil kuantitas dari request

    //     // Validasi: Pastikan kuantitas tidak kurang dari 1
    //     if ($newQuantity >= 1) {
    //         $cartItem->jumlah = $newQuantity;
    //         $cartItem->save();
    //     }

    //     // Kalkulasi harga total
    //     $product = $cartItem->produk;
    //     $newTotalPrice = $cartItem->jumlah * $product->harga;

    //     // Return response ke frontend
    //     return response()->json([
    //         'newQuantity' => $cartItem->jumlah,
    //         'newTotalPrice' => number_format($newTotalPrice, 0, ',', '.')
    //     ]);
    // }


    // public function updateCart(Request $request, $id, $action)
    // {
    //     // Get the cart item from the 'carts' table using the 'id_keranjang' as the primary key
    //     $cartItem = Cart::findOrFail($id); // 'id' here refers to 'id_keranjang' in your table

    //     // Adjust the quantity based on the action ('increase' or 'decrease')
    //     if ($action == 'increase') {
    //         $cartItem->jumlah++; // Increment the quantity
    //     } elseif ($action == 'decrease' && $cartItem->jumlah > 1) {
    //         $cartItem->jumlah--; // Decrement the quantity, but not below 1
    //     }

    //     // Save the updated cart item back to the database
    //     $cartItem->save();

    //     // Retrieve the associated product from the 'produk' table using the 'id_produk' foreign key
    //     $product = $cartItem->produk;  // Assuming you have a 'produk' relationship defined on the Cart model

    //     // Calculate the new total price
    //     $newTotalPrice = $cartItem->jumlah * $product->harga;  // Assuming 'harga' is the price column in the 'produk' table

    //     // Return the updated quantity and total price to the frontend in JSON format
    //     return response()->json([
    //         'newQuantity' => $cartItem->jumlah, // Updated quantity
    //         'newTotalPrice' => number_format($newTotalPrice, 0, ',', '.') // Formatted total price
    //     ]);
    // }

    public function update(Request $request, $id_keranjang)
    {
        // Validasi data
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        // Cari item keranjang berdasarkan id
        $cartItem = Cart::findOrFail($id_keranjang);

        // Update jumlah item
        $cartItem->jumlah = $request->input('jumlah');
        $cartItem->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('cart')->with('success', 'Item berhasil diperbarui.');
    }


    public function removeFromCart($id)
    {
        // $cart = session()->get('cart', []);
        // if (isset($cart[$id])) {
        //     unset($cart[$id]);
        //     session()->put('cart', $cart);
        // }

        // return redirect()->route('cart');
        $cart = Cart::findOrFail($id);
        $cart->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('cart')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    // public function viewCart()
    // {
    //     $cart = session()->get('cart');
    //     return view('cart_index', compact('cart'));
    // }

    // public function removeFromCart($id)
    // {
    //     $cart = session()->get('cart');

    //     if (isset($cart[$id])) {
    //         unset($cart[$id]);
    //         session()->put('cart', $cart);
    //     }

    //     return redirect()->back()->with('success', 'Product removed from cart!');
    // }
    public function index()
    {
        //
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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
