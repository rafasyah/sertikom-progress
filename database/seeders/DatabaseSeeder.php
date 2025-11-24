<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\tahun_ajar;
use App\Models\jurusans;
use App\Models\kelas;
use App\Models\siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Administrator',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create additional admin users for testing
        $adminNames = ['Ahmad Rahman', 'Siti Nurhaliza', 'Budi Santoso', 'Maya Sari', 'Rizki Pratama'];
        foreach ($adminNames as $index => $name) {
            User::firstOrCreate([
                'email' => 'admin' . ($index + 1) . '@example.com',
            ], [
                'name' => $name,
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]);
        }

        // Seed Tahun Ajar (6 years for pagination)
        $tahunAjars = [];
        for ($i = 2019; $i <= 2024; $i++) {
            $tahunAjars[] = tahun_ajar::firstOrCreate(
                ['kode_tahun_ajar' => $i . '/' . ($i + 1)],
                ['nama_tahun_ajar' => $i . '/' . ($i + 1)]
            );
        }

        // Seed Jurusan (6 majors for pagination)
        $jurusans = [];
        $majorData = [
            ['RPL', 'Rekayasa Perangkat Lunak'],
            ['TKJ', 'Teknik Komputer dan Jaringan'],
            ['AKL', 'Akuntansi'],
            ['OTKP', 'Otomatisasi Tata Kelola Perkantoran'],
            ['BDP', 'Bisnis Daring dan Pemasaran'],
            ['DKV', 'Desain Komunikasi Visual'],
        ];

        foreach ($majorData as $major) {
            $jurusans[] = jurusans::firstOrCreate(
                ['kode_jurusan' => $major[0]],
                ['nama_jurusan' => $major[1]]
            );
        }

        // Seed Kelas (multiple classes per combination)
        $kelasList = [];
        $levels = ['X', 'XI', 'XII'];
        $classNumbers = [1, 2, 3];

        foreach ($tahunAjars as $tahunAjar) {
            foreach ($jurusans as $jurusan) {
                foreach ($levels as $level) {
                    foreach ($classNumbers as $number) {
                        $kelasList[] = kelas::firstOrCreate([
                            'nama_kelas' => $level . ' ' . $jurusan->kode_jurusan . ' ' . $number,
                            'level_kelas' => $level,
                            'jurusan_id' => $jurusan->id,
                            'tahun_ajar_id' => $tahunAjar->id,
                        ]);
                    }
                }
            }
        }

        // Seed Siswa (100 students for pagination testing)
        $firstNames = ['Ahmad', 'Budi', 'Citra', 'Dedi', 'Eka', 'Fani', 'Gilang', 'Hana', 'Iwan', 'Joko',
                      'Kartika', 'Lina', 'Maya', 'Nina', 'Oka', 'Putri', 'Rizki', 'Sari', 'Tono', 'Umi',
                      'Vino', 'Wati', 'Xander', 'Yuni', 'Zara', 'Andi', 'Bella', 'Candra', 'Dina', 'Eko'];
        $lastNames = ['Santoso', 'Wijaya', 'Kusuma', 'Pratama', 'Saputra', 'Hartono', 'Susanto', 'Rahayu',
                     'Purnama', 'Siregar', 'Hasan', 'Wulandari', 'Setiawan', 'Lestari', 'Gunawan', 'Nugroho',
                     'Sari', 'Yulianto', 'Puspita', 'Hermawan', 'Kurniawan', 'Indah', 'Maulana', 'Farida',
                     'Ramadan', 'Hidayat', 'Melati', 'Kusnadi', 'Utami', 'Suryadi'];

        for ($i = 0; $i < 100; $i++) {
            $nisn = '2024' . str_pad($i + 1, 6, '0', STR_PAD_LEFT);
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $fullName = $firstName . ' ' . $lastName;
            $gender = rand(0, 1) ? 'laki-laki' : 'perempuan';
            $birthYear = rand(2005, 2008);
            $birthMonth = rand(1, 12);
            $birthDay = rand(1, 28);
            $birthDate = sprintf('%04d-%02d-%02d', $birthYear, $birthMonth, $birthDay);

            $kelas = $kelasList[array_rand($kelasList)];

            siswa::firstOrCreate([
                'nisn' => $nisn,
            ], [
                'nama_lengkap' => $fullName,
                'jenis_kelamin' => $gender,
                'tanggal_lahir' => $birthDate,
                'alamat' => 'Jl. ' . ['Sudirman', 'Thamrin', 'Gatot Subroto', 'Ahmad Yani', 'Diponegoro'][rand(0, 4)] . ' No. ' . rand(1, 100),
                'jurusan_id' => $kelas->jurusan_id,
                'kelas_id' => $kelas->id,
                'tahun_ajar_id' => $kelas->tahun_ajar_id,
            ]);
        }
    }
}
