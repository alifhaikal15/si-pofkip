<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Kegiatan') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="nama_kegiatan" :value="__('Nama Kegiatan')" />
                        <x-text-input id="nama_kegiatan" class="block mt-1 w-full" type="text" name="nama_kegiatan" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="tanggal_pelaksanaan" :value="__('Tanggal Pelaksanaan')" />
                        <x-text-input id="tanggal_pelaksanaan" class="block mt-1 w-full" type="date" name="tanggal_pelaksanaan" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="tempat" :value="__('Tempat')" />
                        <x-text-input id="tempat" class="block mt-1 w-full" type="text" name="tempat" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea id="deskripsi" name="deskripsi" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3"></textarea>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="foto" :value="__('Foto Dokumentasi (Opsional)')" />
                        <input id="foto" type="file" name="foto" class="block w-full text-sm text-gray-500 mt-1" />
                    </div>

                    <div class="flex justify-end mt-4">
                        <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>