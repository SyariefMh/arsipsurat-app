<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class suratController extends Controller
{
    public function index(Request $request)
    {
        

        $query = Surat::with('kategori'); // Eager loading relasi kategoriSurat
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nomor_surat', 'like', "%$search%")
                ->orWhere('judul', 'like', "%$search%")
                ->orWhereHas('kategori', function ($q) use ($search) {
                    $q->where('nama_kategori', 'like', "%$search%");
                });
        }
        $surat = $query->paginate(10);
        return view('homearsip', compact('surat'));
    }

    public function lihat($id)
    {
        try {
            $surat = Surat::findOrFail($id);
            return view('lihat', compact('surat'));
        } catch (Exception $e) {
            return redirect('/arsip')->with('error', 'Surat not found.');
        }
    }
    public function edit($id)
    {
        try {
            $kategori = Kategori::all();
            $surat = Surat::findOrFail($id);
            return view('editSurat', compact('surat', 'kategori'));
        } catch (Exception $e) {
            return redirect('/arsip')->with('error', 'Surat not found.');
        }
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();

        return redirect('/arsip')->with('success', 'Surat berhasil dihapus');
    }
}
