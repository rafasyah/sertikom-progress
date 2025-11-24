<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\jurusans;
use App\Models\tahun_ajar;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = kelas::with('jurusan', 'tahun_ajar')->paginate(10);
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = jurusans::all();
        $tahunAjars = tahun_ajar::all();
        return view('kelas.create', compact('jurusans', 'tahunAjars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'level_kelas' => 'required|in:X,XI,XII',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kelas $kela)
    {
        $jurusans = jurusans::all();
        $tahunAjars = tahun_ajar::all();
        return view('kelas.edit', compact('kela', 'jurusans', 'tahunAjars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kelas $kela)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'level_kelas' => 'required|in:X,XI,XII',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        $kela->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kelas $kela)
    {
        $kela->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
