<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $data = Produk::whereBetween('harga', [20000, 1000000])
                      ->orderBy('nama', 'asc')
                      ->get();
         $nama = [];
         $desc = [];
         $harga = [];
         
        foreach ($data as $produk) {
            $nama[] = $produk->nama;
            $desc[] = $produk->deskripsi;
            $harga[] = $produk->harga;
        }

        return view('list_produk', compact('nama', 'desc', 'harga'));
    }
}