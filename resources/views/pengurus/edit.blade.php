<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pengurus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('pengurus.update', $pengurus) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama', $pengurus->nama)" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jabatan" :value="__('Jabatan')" />
                            <x-text-input id="jabatan" class="block mt-1 w-full" type="text" name="jabatan" :value="old('jabatan', $pengurus->jabatan)" required />
                            <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nomor_hp" :value="__('Nomor HP (Opsional)')" />
                            <x-text-input id="nomor_hp" class="block mt-1 w-full" type="text" name="nomor_hp" :value="old('nomor_hp', $pengurus->nomor_hp)" />
                            <x-input-error :messages="$errors->get('nomor_hp')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tahun_jabatan" :value="__('Tahun Jabatan (Opsional)')" />
                            <x-text-input id="tahun_jabatan" class="block mt-1 w-full" type="text" name="tahun_jabatan" :value="old('tahun_jabatan', $pengurus->tahun_jabatan)" />
                            <x-input-error :messages="$errors->get('tahun_jabatan')" class="mt-2" />
                        </div>

                        @if ($pengurus->foto)
                            <div class="mb-4">
                                <x-input-label :value="__('Foto Saat Ini')" />
                                <img src="{{ asset($pengurus->foto) }}" alt="{{ $pengurus->nama }}" class="h-20 w-20 object-cover mt-2 rounded-lg">
                            </div>
                        @endif

                        <div class="mb-6">
                            <x-input-label for="foto" :value="__('Ganti Foto (Opsional)')" />
                            <input id="foto" type="file" name="foto" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('pengurus.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                {{ __('Batal') }}
                            </a>
                            <x-primary-button>
                                {{ __('Perbarui Data') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>