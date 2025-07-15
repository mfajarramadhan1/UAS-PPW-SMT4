<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout.
     */
    public function index()
{
    $cart = session('cart', []);
    $total = collect($cart)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    return view('checkout', compact('cart', 'total'));
}

    /**
     * Menyimpan pesanan ke database.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'alamat' => 'required|string',
        'metode_pembayaran' => 'required|string', // validasi
    ]);

    $cart = session('cart', []);
    if (empty($cart)) {
        return redirect()->back()->withErrors(['cart' => 'Keranjang Anda kosong.']);
    }

    $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

    Order::create([
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'alamat' => $request->alamat,
        'metode_pembayaran' => $request->metode_pembayaran,
        'items' => json_encode($cart),
        'total' => $total,
    ]);

    session()->forget('cart');
    return redirect()->route('checkout.success');
}


}