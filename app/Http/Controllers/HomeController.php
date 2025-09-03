<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda dengan data produk populer.
     */
    public function index()
    {
        // 1. Siapkan data di sini (menggantikan blok @php di view)
        $popularProducts = [
            ['name' => 'KOPI SUSU', 'image' => 'img/coffe/1.png'],
            ['name' => 'KOPI GULA AREN', 'image' => 'img/coffe/2.png'],
            ['name' => 'AMERICANO', 'image' => 'https://placehold.co/200x200/f8f9fa/333?text=Americano'],
            ['name' => 'CAFE LATTE', 'image' => 'https://placehold.co/200x200/f8f9fa/333?text=Latte'],
            ['name' => 'MATCHA LATTE', 'image' => 'https://placehold.co/200x200/f8f9fa/333?text=Matcha'],
            ['name' => 'CHOCOLATE', 'image' => 'https://placehold.co/200x200/f8f9fa/333?text=Cokelat'],
            ['name' => 'MILK TEA', 'image' => 'https://placehold.co/200x200/f8f9fa/333?text=Milk+Tea'],
        ];

        // 2. Kirim data tersebut ke view saat me-render halaman
        // 'beranda' adalah nama file blade Anda (misal: beranda.blade.php)
        return view('beranda', [
            'popularProducts' => $popularProducts
        ]);
    }
}