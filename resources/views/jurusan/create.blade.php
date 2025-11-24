<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Jurusan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('jurusan.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="kode_jurusan" :value="__('Kode Jurusan')" />
                            <x-text-input id="kode_jurusan" name="kode_jurusan" type="text" class="mt-1 block w-full" :value="old('kode_jurusan')" required />
                            <x-input-error :messages="$errors->get('kode_jurusan')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nama_jurusan" :value="__('Nama Jurusan')" />
                            <x-text-input id="nama_jurusan" name="nama_jurusan" type="text" class="mt-1 block w-full" :value="old('nama_jurusan')" required />
                            <x-input-error :messages="$errors->get('nama_jurusan')" class="mt-2" />
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