<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = kategori::query(); // Eager loading relasi kategoriSurat
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_kategori', 'like', "%$search%")
                ->orWhere('keterangan', 'like', "%$search%");
                }
        $kategori = $query->paginate(10);
        return view('kategori', compact('kategori'));
    }

    public function tambahKategori()
    {
        return view('tambahKategori');
    }

    public function create()
    {
        $nextId = Kategori::max('id') + 1;
        return view('tambahKategori', compact('nextId'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $tambahKategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);
        // dd($tambahKategori);
        return redirect('/tambahKategori')->with('success', 'Absensi dinas luar berhasil disimpan');
    }

    public function destroy($id)
    {
            $kategori = Kategori::findOrFail($id);
            $kategori->delete();
            return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus');
    }
    public function edit($id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            return view('editKategori', compact('kategori'));
        } catch (Exception $e) {
            return redirect('/arsip')->with('error', 'Surat not found.');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        try {
            $kategori = Kategori::findOrFail($id);

            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->keterangan = $request->keterangan;

            $kategori->save();

            return redirect('/kategori')->with('success', 'Kategori berhasil diupdate');
        } catch (Exception $e) {
            return redirect('/arsip')->with('error', 'Kategori not found.');
        }
    }
}
