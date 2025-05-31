<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show(Request $request, $editId = null)
    {
        $data = Produk::orderBy('nama', 'asc')->get();

        $nama = [];
        $desc = [];
        $harga = [];
        $id = [];

        foreach ($data as $produk) {
            $nama[] = $produk->nama;
            $desc[] = $produk->deskripsi;
            $harga[] = $produk->harga;
            $id[] = $produk->id;
        }

        $produk = null;
        if ($editId) {
            $produk = Produk::find($editId);
        }

        return view('list_produk', compact('nama', 'desc', 'harga', 'id', 'produk'));
    }

    public function simpan(Request $request)
    {
        Produk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        return $this->show(new Request(), $id);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);

        return redirect()->route('produk.show')->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            $produk->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    }
}
