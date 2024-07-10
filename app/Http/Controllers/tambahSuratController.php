<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Surat;
use Exception;
use Illuminate\Http\Request;

class tambahSuratController extends Controller
{
    public function index(){

        $kategori = Kategori::all(); // Ambil semua data kategori dari database
        
        return view('tambahsurat', compact('kategori'));
    }

    public function store(Request $request){
        $request->validate([
            'nomor_surat' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10000',
        ]);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads', 'public'); // Store file in the 'public/uploads' directory
        }
    
        $tambahSurat = Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file' => $filePath, // Store the file path in the database
        ]);
    
        return redirect('/tambahsurat')->with('success', 'Surat berhasil disimpan');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required',
            'file' => 'nullable|file|mimes:pdf|max:10000', // File menjadi opsional
        ]);

        try {
            $surat = Surat::findOrFail($id);

            $surat->nomor_surat = $request->nomor_surat;
            $surat->kategori_id = $request->kategori_id;
            $surat->judul = $request->judul;

            // Handle file update
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filePath = $file->store('uploads', 'public');
                $surat->file = $filePath;
            }

            $surat->save();

            return redirect('/tambahsurat')->with('success', 'Surat berhasil diupdate');
        } catch (Exception $e) {
            return redirect('/arsip')->with('error', 'Surat not found.');
        }
    }
}
