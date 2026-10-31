
<x-layouts.app title="Tambah Jadwal Periksa">
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Tambah Jadwal Periksa
        </h1>

        {{-- Pesan error validasi dari Laravel --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                <p class="font-semibold mb-2">
                    Terdapat kesalahan pada pengisian formulir:
                </p>

                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow max-w-xl">
            <form
                action="{{ route('jadwal-periksa.store') }}"
                method="POST"
                novalidate
            >
                @csrf

                <div class="mb-4">
                    <label for="hari" class="block mb-2 font-medium">
                        Hari
                    </label>

                    <select
                        id="hari"
                        name="hari"
                        class="w-full border rounded-lg p-2"
                        required
                    >
                        <option value="">-- Pilih Hari --</option>

                        @foreach ([
                            'Senin',
                            'Selasa',
                            'Rabu',
                            'Kamis',
                            'Jumat',
                            'Sabtu',
                            'Minggu'
                        ] as $hari)
                            <option
                                value="{{ $hari }}"
                                {{ old('hari') == $hari ? 'selected' : '' }}
                            >
                                {{ $hari }}
                            </option>
                        @endforeach
                    </select>

                    @error('hari')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="jam_mulai" class="block mb-2 font-medium">
                        Jam Mulai
                    </label>

                    <input
                        type="time"
                        id="jam_mulai"
                        name="jam_mulai"
                        value="{{ old('jam_mulai') }}"
                        class="w-full border rounded-lg p-2"
                        required
                    >

                    @error('jam_mulai')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="jam_selesai" class="block mb-2 font-medium">
                        Jam Selesai
                    </label>

                    <input
                        type="time"
                        id="jam_selesai"
                        name="jam_selesai"
                        value="{{ old('jam_selesai') }}"
                        class="w-full border rounded-lg p-2"
                        required
                    >

                    @error('jam_selesai')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg"
                    >
                        Simpan
                    </button>

                    <a
                        href="{{ route('jadwal-periksa.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg"
                    >
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>z
</x-layouts.app>
