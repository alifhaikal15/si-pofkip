<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Presensi') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('presensi.update', $presensi) }}">
                    @csrf @method('PUT')
                    
                    <div class="mb-4">
                        <x-input-label for="kegiatan_id" :value="__('Pilih Kegiatan')" />
                        <select id="kegiatan_id" name="kegiatan_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            @foreach($kegiatan as $k)
                                <option value="{{ $k->id }}" {{ $presensi->kegiatan_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kegiatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="nama_anggota" :value="__('Nama Anggota')" />
                        <x-text-input id="nama_anggota" class="block mt-1 w-full" type="text" name="nama_anggota" :value="$presensi->nama_anggota" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="status" :value="__('Status Kehadiran')" />
                        <select id="status" name="status" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="Hadir" {{ $presensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="Izin" {{ $presensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                            <option value="Sakit" {{ $presensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="Alpha" {{ $presensi->status == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                        </select>
                    </div>

                    <div class="flex justify-end mt-4">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>