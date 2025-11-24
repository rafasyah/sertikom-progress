<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('kelas.update', $kela) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="nama_kelas" :value="__('Nama Kelas')" />
                            <x-text-input id="nama_kelas" name="nama_kelas" type="text" class="mt-1 block w-full" :value="old('nama_kelas', $kela->nama_kelas)" required />
                            <x-input-error :messages="$errors->get('nama_kelas')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="level_kelas" :value="__('Level Kelas')" />
                            <select id="level_kelas" name="level_kelas" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Level</option>
                                <option value="X" {{ old('level_kelas', $kela->level_kelas) == 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ old('level_kelas', $kela->level_kelas) == 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ old('level_kelas', $kela->level_kelas) == 'XII' ? 'selected' : '' }}>XII</option>
                            </select>
                            <x-input-error :messages="$errors->get('level_kelas')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jurusan_id" :value="__('Jurusan')" />
                            <select id="jurusan_id" name="jurusan_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $kela->jurusan_id) == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('jurusan_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tahun_ajar_id" :value="__('Tahun Ajar')" />
                            <select id="tahun_ajar_id" name="tahun_ajar_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Tahun Ajar</option>
                                @foreach($tahunAjars as $tahunAjar)
                                    <option value="{{ $tahunAjar->id }}" {{ old('tahun_ajar_id', $kela->tahun_ajar_id) == $tahunAjar->id ? 'selected' : '' }}>{{ $tahunAjar->nama_tahun_ajar }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('tahun_ajar_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end">
                            <x-primary-button>
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>