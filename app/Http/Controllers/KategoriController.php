<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function showKat()
    {
        $katData = kategori::all();
        return view('admin.kategori.kategori', compact('katData'));
    }
    public function tambahkat()
    {
        return view('admin.kategori.tambahspel');
    }

    public function addkat(Request $request)
    {
        $request->validate(
            [
                'kategori'     => 'required',
                'jenis'     => 'required',
            ],
            [
                'kategori.required'    => 'kategori harus di isi',
                'jenis.required'    => 'kategori harus di isi'
            ]
        );
        $model  = new kategori();
        $model->kategori = $request->kategori;
        $model->save();

        return redirect('/kategori')->with('success', 'Data kategori berhasil ditambahkan');
    }
    public function editKat($id)
    {
        $kategori = kategori::find($id);

        if (!$kategori) {
            return redirect()->route('showskat')->with('error', 'Data kategori tidak ditemukan');
        }
        return view('admin.kategori.editspel', compact('kategori'));
    }
    public function updateKat(Request $request, $id)
    {
        $kategori = kategori::find($id);
        if (!$kategori) {
            return redirect()->route('showskat')->with('error', 'Data kategori tidak ditemukan');
        }
        $kategori->kategori = $request->kategori;
        $kategori->save();

        return redirect()->route('showskat')->with('success', 'Data kategori berhasil diperbarui');
    }
    public function hapusKat($id)
    {

        $kategori = kategori::find($id);
        if (!$kategori) {
            return redirect()->route('showskat')->with('error', 'Data kategori tidak ditemukan');
        }
        $kategori->delete();

        return redirect()->route('showskat')->with('success', 'Data kategori berhasil dihapus');
    }
}
