<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::latest()->get();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric|max:100000000000000000',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);
        if($request->hasFile('gambar')) {
            $validate['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }
        produk::create($validate);
        return redirect()->route('produk.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric|max:100000000000000000',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);
        if($request->hasFile('gambar')) {
            if($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $validate['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }
        $produk->update($validate);
        return redirect()->route('produk.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
         if($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data Berhasil Dihapus');
    }
}
