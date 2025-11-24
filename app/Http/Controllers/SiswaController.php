<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\kelas_detail;
use App\Models\jurusans;
use App\Models\kelas;
use App\Models\tahun_ajar;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = siswa::with('jurusan', 'kelas', 'tahun_ajar');

        if ($request->has('search') && $request->search) {
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%')
                  ->orWhere('nisn', 'like', '%' . $request->search . '%');
        }

        if ($request->has('jurusan_id') && $request->jurusan_id) {
            $query->where('jurusan_id', $request->jurusan_id);
        }

        if ($request->has('kelas_id') && $request->kelas_id) {
            $query->where('kelas_id', $request->kelas_id);
        }

        $siswas = $query->paginate(10);
        $jurusans = jurusans::all();
        $kelas = kelas::all();

        return view('siswa.index', compact('siswas', 'jurusans', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = jurusans::all();
        $kelas = kelas::all();
        $tahunAjars = tahun_ajar::all();
        return view('siswa.create', compact('jurusans', 'kelas', 'tahunAjars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswas',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        $siswa = siswa::create($request->all());

        // Create kelas_detail
        kelas_detail::create([
            'siswa_id' => $siswa->id,
            'kelas_id' => $request->kelas_id,
            'tahun_ajar_id' => $request->tahun_ajar_id,
            'status' => 'aktif',
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(siswa $siswa)
    {
        $kelasDetails = $siswa->kelas_details()->with('kelas', 'tahun_ajar')->get();
        return view('siswa.show', compact('siswa', 'kelasDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(siswa $siswa)
    {
        $jurusans = jurusans::all();
        $kelas = kelas::all();
        $tahunAjars = tahun_ajar::all();
        return view('siswa.edit', compact('siswa', 'jurusans', 'kelas', 'tahunAjars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, siswa $siswa)
    {
        $request->validate([
            'nisn' => 'required|unique:siswas,nisn,' . $siswa->id,
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        $oldKelasId = $siswa->kelas_id;
        $oldTahunAjarId = $siswa->tahun_ajar_id;

        $siswa->update($request->all());

        // If class or year changed, update kelas_detail
        if ($oldKelasId != $request->kelas_id || $oldTahunAjarId != $request->tahun_ajar_id) {
            // Set old active to non-aktif
            kelas_detail::where('siswa_id', $siswa->id)->where('status', 'aktif')->update(['status' => 'non-aktif']);

            // Create new active
            kelas_detail::create([
                'siswa_id' => $siswa->id,
                'kelas_id' => $request->kelas_id,
                'tahun_ajar_id' => $request->tahun_ajar_id,
                'status' => 'aktif',
            ]);
        }

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
