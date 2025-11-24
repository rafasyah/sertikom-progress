<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Siswa: ') . $siswa->nama_lengkap }}
            </h2>
            <a href="{{ route('siswa.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Informasi Siswa</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div><strong>NISN:</strong> {{ $siswa->nisn }}</div>
                        <div><strong>Nama Lengkap:</strong> {{ $siswa->nama_lengkap }}</div>
                        <div><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</div>
                        <div><strong>Tanggal Lahir:</strong> {{ $siswa->tanggal_lahir->format('d-m-Y') }}</div>
                        <div><strong>Alamat:</strong> {{ $siswa->alamat }}</div>
                        <div><strong>Jurusan:</strong> {{ $siswa->jurusan->nama_jurusan }}</div>
                        <div><strong>Kelas Saat Ini:</strong> {{ $siswa->kelas->nama_kelas }}</div>
                        <div><strong>Tahun Ajar Saat Ini:</strong> {{ $siswa->tahun_ajar->nama_tahun_ajar }}</div>
                    </div>

                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Riwayat Kelas</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-700">
                                    <th class="px-4 py-2 text-left">Kelas</th>
                                    <th class="px-4 py-2 text-left">Tahun Ajar</th>
                                    <th class="px-4 py-2 text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kelasDetails as $detail)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">{{ $detail->kelas->nama_kelas }}</td>
                                        <td class="px-4 py-2">{{ $detail->tahun_ajar->nama_tahun_ajar }}</td>
                                        <td class="px-4 py-2">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $detail->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ ucfirst($detail->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-2 text-center">Tidak ada riwayat</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>