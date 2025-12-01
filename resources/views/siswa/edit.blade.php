<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Siswa') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-xl border border-gray-200 dark:border-gray-700">
                <div class="p-8">

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-6 border-b pb-3">
                        Data Siswa
                    </h3>

                    <form action="{{ route('siswa.update', $siswa) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- NISN -->
                            <div>
                                <x-input-label for="nisn" :value="__('NISN')" />
                                <x-text-input id="nisn" name="nisn" type="text"
                                    class="mt-1 block w-full"
                                    :value="old('nisn', $siswa->nisn)" required />
                                <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
                            </div>

                            <!-- Nama Lengkap -->
                            <div>
                                <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                                <x-text-input id="nama_lengkap" name="nama_lengkap" type="text"
                                    class="mt-1 block w-full"
                                    :value="old('nama_lengkap', $siswa->nama_lengkap)" required />
                                <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                <select id="jenis_kelamin" name="jenis_kelamin"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700
                                    dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="laki-laki"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="perempuan"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                                <x-text-input id="tanggal_lahir" name="tanggal_lahir" type="date"
                                    class="mt-1 block w-full"
                                    :value="old('tanggal_lahir', $siswa->tanggal_lahir->format('Y-m-d'))" required />
                                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div>
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <textarea id="alamat" name="alamat" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700
                                dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500">{{ old('alamat', $siswa->alamat) }}</textarea>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mt-10 mb-4 border-b pb-3">
                            Informasi Akademik
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Jurusan -->
                            <div>
                                <x-input-label for="jurusan_id" :value="__('Jurusan')" />
                                <select id="jurusan_id" name="jurusan_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900
                                    dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Pilih Jurusan</option>
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}"
                                            {{ old('jurusan_id', $siswa->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                                            {{ $jurusan->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('jurusan_id')" class="mt-2" />
                            </div>

                            <!-- Kelas -->
                            <div>
                                <x-input-label for="kelas_id" :value="__('Kelas')" />
                                <select id="kelas_id" name="kelas_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900
                                    dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Pilih Kelas</option>
                                    @foreach($kelas as $kela)
                                        <option value="{{ $kela->id }}"
                                            {{ old('kelas_id', $siswa->kelas_id) == $kela->id ? 'selected' : '' }}>
                                            {{ $kela->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
                            </div>

                            <!-- Tahun Ajar -->
                            <div>
                                <x-input-label for="tahun_ajar_id" :value="__('Tahun Ajar')" />
                                <select id="tahun_ajar_id" name="tahun_ajar_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900
                                    dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Pilih Tahun Ajar</option>
                                    @foreach($tahunAjars as $tahunAjar)
                                        <option value="{{ $tahunAjar->id }}"
                                            {{ old('tahun_ajar_id', $siswa->tahun_ajar_id) == $tahunAjar->id ? 'selected' : '' }}>
                                            {{ $tahunAjar->nama_tahun_ajar }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('tahun_ajar_id')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end pt-6">
                            <x-primary-button class="px-6 py-3 text-base">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
