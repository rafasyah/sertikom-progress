<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('siswa.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="nisn" :value="__('NISN')" />
                            <x-text-input id="nisn" name="nisn" type="text" class="mt-1 block w-full" :value="old('nisn')" required />
                            <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama_lengkap" name="nama_lengkap" type="text" class="mt-1 block w-full" :value="old('nama_lengkap')" required />
                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                            <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                            <x-text-input id="tanggal_lahir" name="tanggal_lahir" type="date" class="mt-1 block w-full" :value="old('tanggal_lahir')" required />
                            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <textarea id="alamat" name="alamat" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="3" required>{{ old('alamat') }}</textarea>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jurusan_id" :value="__('Jurusan')" />
                            <select id="jurusan_id" name="jurusan_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('jurusan_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="kelas_id" :value="__('Kelas')" />
                            <select id="kelas_id" name="kelas_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $kela)
                                    <option value="{{ $kela->id }}" {{ old('kelas_id') == $kela->id ? 'selected' : '' }}>{{ $kela->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tahun_ajar_id" :value="__('Tahun Ajar')" />
                            <select id="tahun_ajar_id" name="tahun_ajar_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Tahun Ajar</option>
                                @foreach($tahunAjars as $tahunAjar)
                                    <option value="{{ $tahunAjar->id }}" {{ old('tahun_ajar_id') == $tahunAjar->id ? 'selected' : '' }}>{{ $tahunAjar->nama_tahun_ajar }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('tahun_ajar_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end">
                            <x-primary-button>
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>