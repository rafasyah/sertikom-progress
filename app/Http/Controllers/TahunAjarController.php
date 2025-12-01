<?php

namespace App\Http\Controllers;

use App\Models\tahun_ajar;
use Illuminate\Http\Request;

class TahunAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjars = tahun_ajar::paginate(10);
        return view('tahun_ajar.index', compact('tahunAjars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        return view('tahun_ajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        $request->validate([
            'kode_tahun_ajar' => 'required|unique:tahun_ajars',
            'nama_tahun_ajar' => 'required',
        ]);

        tahun_ajar::create($request->all());

        return redirect()->route('tahun-ajar.index')->with('success', 'Tahun Ajar berhasil ditambahkan.');
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
    public function edit(tahun_ajar $tahunAjar)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        return view('tahun_ajar.edit', compact('tahunAjar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tahun_ajar $tahunAjar)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        $request->validate([
            'kode_tahun_ajar' => 'required|unique:tahun_ajars,kode_tahun_ajar,' . $tahunAjar->id,
            'nama_tahun_ajar' => 'required',
        ]);

        $tahunAjar->update($request->all());

        return redirect()->route('tahun-ajar.index')->with('success', 'Tahun Ajar berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tahun_ajar $tahunAjar)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        $tahunAjar->delete();

        return redirect()->route('tahun-ajar.index')->with('success', 'Tahun Ajar berhasil dihapus.');
    }
}
