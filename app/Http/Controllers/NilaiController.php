<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Perkuliahan;

class NilaiController extends Controller
{

    public function index()
    {
        $mahasiswas = DB::table('perkuliahans')
                        ->join('mahasiswas', 'perkuliahans.nim', '=', 'mahasiswas.nim')
                        ->join('matakuliahs', 'perkuliahans.kode_mk', '=', 'matakuliahs.kode_mk')
                        ->select('mahasiswas.nim', 'mahasiswas.nama', 'mahasiswas.alamat', 'mahasiswas.tanggal_lahir',
                                'matakuliahs.kode_mk', 'matakuliahs.nama_mk', 'matakuliahs.sks',
                                'perkuliahans.nilai')
                        ->paginate(10); 
    
        return view('mahasiswa.index', compact('mahasiswas'));
    }
    

    public function show($nim, $kode_mk)
    {
        $perkuliahan = Perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk)->firstOrFail();
    
        return view('mahasiswa.show', compact('perkuliahan'));
    }
    
    public function edit($nim, $kode_mk)
    {
        $perkuliahan = Perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk)->firstOrFail();
        return view('mahasiswa.edit', compact('perkuliahan'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|exists:mahasiswas,nim',
            'kode_mk' => 'required|exists:matakuliahs,kode_mk',
            'nilai' => 'required|numeric',
        ]);
    
        Perkuliahan::create($validatedData);
    
        return redirect()->route('mahasiswa.index')->with('success', 'Nilai mahasiswa berhasil disimpan');
    }
    

    public function update(Request $request, $nim, $kode_mk)
    {
        $validatedData = $request->validate([
            'nilai' => 'required|numeric',
        ]);
    
        $perkuliahan = Perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk)->firstOrFail();
        $perkuliahan->update($validatedData);
    
        return redirect()->route('mahasiswa.index')->with('success', 'Nilai mahasiswa berhasil diperbarui');
    }
    
    

    public function destroy($nim, $kode_mk)
    {
        $perkuliahan = Perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk)->firstOrFail();
        $perkuliahan->delete();
    
        return redirect()->route('mahasiswa.index')->with('success', 'Nilai mahasiswa berhasil dihapus');
    }
    
}
