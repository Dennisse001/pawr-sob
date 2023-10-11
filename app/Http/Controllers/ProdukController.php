<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\Produk;
use Illuminate\Support\Str;

    class ProdukController extends Controller
    {
        public function showProd()
        {
            $proData = produk::with(['kategori'])->get();
            $kategoriData = kategori::all();

            return view('admin.produk.listprod', compact('proData', 'kategoriData'));
        }

        public function tambahprod()
        {
            $proData = Produk::with(['kategori'])->get();
            $kategoriData = kategori::all();

            return view('admin.produk.tambahprod', compact('proData', 'kategoriData'));
        }

        public function addprod(Request $request)
        {
            // dd($request->all());
            // $request->validate([
            //     'produk' => 'required',
            //     'cover' => 'required',
            //     'deskripsi' => 'required',
            //     'harga' => 'required',
            //     'kategori_id' => 'required|exists:kategoris,id',
            // ], [
            //     'produk.required' => 'Produk harus diisi.',
            //     'cover.required' => 'Cover harus diisi.',
            //     'deskripsi.required' => 'deskripsi User harus diisi.',
            //     'harga.required' => 'Harga harus diisi.',
            //     'kategori_id.required' => 'ID kategori harus diisi.',
            //     'kategori_id.exists' => 'ID kategori tidak valid.'
            // ]);

            $model = new Produk();
            $model->produk = $request->produk;
            $model->deskripsi = $request->deskripsi;
            $model->harga = $request->harga;

            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                @unlink(storage_path('app/public/produk/' . $model->cover));
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/produk', $filename);
                $model->cover = $filename;
            }
            $model->save();
            $model->kategori()->associate($request->kategori_id);
            $model->save();

            return redirect('/admin/produk')->with('success', 'Data produk berhasil ditambahkan.');
        }


        public function editprod($id)
        {
            $produk = Produk::with([ 'kategori'])->find($id);
            $kategoriData = kategori::all();

            return view('admin.produk.editprod', compact('produk', 'kategoriData'));
        }

        public function updateprod(Request $request, $id)
        {
            $request->validate([]);
            $model = Produk::findOrFail($id);
            $model->status = $request->status;
            $model->jadwal = $request->jadwal;
            $model->jam = $request->jam;
            $model->user()->associate($request->user_id);
            $model->spesialis()->associate($request->spesialis_id);
            $model->save();
            return redirect('/produk')->with('success', 'Data produk berhasil diperbarui.');
        }

        public function hapusprod($id)
        {

            $produk = Produk::find($id);
            if (!$produk) {
                return redirect()->route('showsprod')->with('error', 'Data produk tidak ditemukan');
            }
            $produk->delete();

            return redirect()->route('showsprod')->with('success', 'Data dokter berhasil dihapus');
        }
    }


