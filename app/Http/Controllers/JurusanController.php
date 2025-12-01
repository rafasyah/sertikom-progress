<?php

namespace App\Http\Controllers;

use App\Models\jurusans;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = jurusans::paginate(10);
        return view('jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        return view('jurusan.create');
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
            'kode_jurusan' => 'required|unique:jurusans',
            'nama_jurusan' => 'required',
        ]);

        jurusans::create($request->all());

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
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
    public function edit(jurusans $jurusan)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jurusans $jurusan)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        $request->validate([
            'kode_jurusan' => 'required|unique:jurusans,kode_jurusan,' . $jurusan->id,
            'nama_jurusan' => 'required',
        ]);

        $jurusan->update($request->all());

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jurusans $jurusan)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
