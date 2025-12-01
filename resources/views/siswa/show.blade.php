<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detail Siswa — {{ $siswa->nama_lengkap }}
            </h2>

            <a href="{{ route('siswa.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded shadow">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- ====================== -->
            <!-- PROFILE HEADER SECTION -->
            <!-- ====================== -->
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl overflow-hidden">
                <div class="p-6 sm:p-8">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                        <!-- Profile Icon -->
                        <div class="flex items-center gap-4">
                            <div class="w-20 h-20 bg-indigo-600 text-white rounded-full flex items-center justify-center text-3xl font-bold shadow">
                                {{ strtoupper(substr($siswa->nama_lengkap, 0, 1)) }}
                            </div>

                            <div>
                                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $siswa->nama_lengkap }}
                                </h1>
                                <p class="text-gray-600 dark:text-gray-300">
                                    NISN: <span class="font-semibold">{{ $siswa->nisn }}</span>
                                </p>
                            </div>
                        </div>

                        <!-- Current Class Info -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm w-full md:w-auto">
                            <p class="text-sm text-gray-500 dark:text-gray-300">Kelas Saat Ini</p>
                            <p class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ $siswa->kelas->nama_kelas }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-300 mt-1">
                                Tahun Ajar: {{ $siswa->tahun_ajar->nama_tahun_ajar }}
                            </p>
                        </div>

                    </div>

                </div>
            </div>


            <!-- ====================== -->
            <!-- DETAIL INFO GRID -->
            <!-- ====================== -->
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Informasi Lengkap
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <p class="text-sm text-gray-500">Nama Lengkap</p>
                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $siswa->nama_lengkap }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Jenis Kelamin</p>
                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $siswa->jenis_kelamin }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Tanggal Lahir</p>
                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $siswa->tanggal_lahir->format('d-m-Y') }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Alamat</p>
                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $siswa->alamat }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Jurusan</p>
                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $siswa->jurusan->nama_jurusan }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Kelas Saat Ini</p>
                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $siswa->kelas->nama_kelas }}</p>
                    </div>

                </div>
            </div>


            <!-- ====================== -->
            <!-- RIWAYAT KELAS TABLE -->
            <!-- ====================== -->
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-xl p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Riwayat Kelas
                </h3>

                <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-left">
                            <tr>
                                <th class="px-4 py-3">Kelas</th>
                                <th class="px-4 py-3">Tahun Ajar</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">

                            @forelse($kelasDetails as $detail)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100"">{{ $detail->kelas->nama_kelas }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100"">{{ $detail->tahun_ajar->nama_tahun_ajar }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full
                                            {{ $detail->status == 'aktif'
                                                ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                                : 'bg-gray-200 text-gray-800 dark:bg-gray-600 dark:text-gray-200' }}">
                                            {{ ucfirst($detail->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-500 dark:text-gray-300">
                                        Tidak ada riwayat kelas.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
