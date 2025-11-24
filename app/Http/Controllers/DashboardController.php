<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\jurusans;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = siswa::count();
        $totalJurusan = jurusans::count();
        $totalKelas = kelas::count();
        $totalUser = User::count();

        // Latest students
        $latestSiswa = siswa::with('jurusan', 'kelas', 'tahun_ajar')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Student distribution per jurusan
        $siswaPerJurusan = jurusans::withCount('siswa')
            ->get();

        return view('dashboard', compact('totalSiswa', 'totalJurusan', 'totalKelas', 'totalUser', 'latestSiswa', 'siswaPerJurusan'));
    }
}