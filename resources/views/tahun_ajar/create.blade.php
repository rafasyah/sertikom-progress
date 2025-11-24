<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Tahun Ajar') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
                    <form action="{{ route('tahun-ajar.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="kode_tahun_ajar" :value="__('Kode Tahun Ajar')" />
                            <x-text-input id="kode_tahun_ajar" name="kode_tahun_ajar" type="text" class="mt-1 block w-full" :value="old('kode_tahun_ajar')" required />
                            <x-input-error :messages="$errors->get('kode_tahun_ajar')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nama_tahun_ajar" :value="__('Nama Tahun Ajar')" />
                            <x-text-input id="nama_tahun_ajar" name="nama_tahun_ajar" type="text" class="mt-1 block w-full" :value="old('nama_tahun_ajar')" required />
                            <x-input-error :messages="$errors->get('nama_tahun_ajar')" class="mt-2" />
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
</x-app-layout>