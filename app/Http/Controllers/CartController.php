<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Tampilkan halaman keranjang
    public function index()
    {
        $cart = session('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('keranjang', compact('cart', 'total'));
    }

    // Tambah produk ke keranjang
    public function add(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session('cart', []);

        // Cek apakah produk sudah ada di session
        $found = false;
        foreach ($cart as &$item) {
            if ($item['name'] === $request->name) {
                $item['quantity'] += $request->quantity;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'name'     => $request->name,
                'price'    => $request->price,
                'quantity' => $request->quantity
            ];
        }

        // Simpan ke session
        session(['cart' => $cart]);

        // Juga simpan ke tabel cart_items di database
        CartItem::create([
            'name'     => $request->name,
            'price'    => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Hapus item tertentu dari keranjang (pakai index)
    public function remove($index)
    {
        $cart = session('cart', []);
        if (isset($cart[$index])) {
            // Jika mau hapus dari DB juga, bisa pakai where
            CartItem::where('name', $cart[$index]['name'])->delete();
            unset($cart[$index]);
        }

        session(['cart' => array_values($cart)]); // reset index
        return redirect()->back()->with('success', 'Item dihapus dari keranjang.');
    }

    // Kosongkan seluruh keranjang
    public function clear()
    {
        session()->forget('cart');
        CartItem::truncate();
        return redirect()->back()->with('success', 'Keranjang dikosongkan.');
    }

    public function checkout(Request $request)
    {
        $cart = session('cart', []);
        if (count($cart) === 0) {
            return redirect()->route('keranjang')->withErrors(['Keranjang kosong.']);
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Simpan ke tabel orders
        \DB::table('orders')->insert([
            'nama' => $request->input('nama'),
            'telepon' => $request->input('telepon'),
            'alamat' => $request->input('alamat'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'items' => json_encode($cart),
            'total' => $total,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Kosongkan session keranjang & tabel cart_items
        session()->forget('cart');
        CartItem::truncate();

        return redirect()->route('checkout.success')->with('success', 'Pesanan berhasil dibuat!');
    }
}
