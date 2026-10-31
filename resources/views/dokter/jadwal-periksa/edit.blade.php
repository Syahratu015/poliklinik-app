
<x-layouts.app title="Edit Jadwal Periksa">
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Edit Jadwal Periksa
        </h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow max-w-xl">
            <form action="{{ route('jadwal-periksa.update', $jadwal_periksa->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-2 font-medium">Hari</label>
                    <select name="hari" class="w-full border rounded-lg p-2" required>
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                            <option value="{{ $hari }}"
                                {{ old('hari', $jadwal_periksa->hari) == $hari ? 'selected' : '' }}>
                                {{ $hari }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-medium">Jam Mulai</label>
                    <input type="time" name="jam_mulai"
                           value="{{ old('jam_mulai', substr($jadwal_periksa->jam_mulai, 0, 5)) }}"
                           class="w-full border rounded-lg p-2" required>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-medium">Jam Selesai</label>
                    <input type="time" name="jam_selesai"
                           value="{{ old('jam_selesai', substr($jadwal_periksa->jam_selesai, 0, 5)) }}"
                           class="w-full border rounded-lg p-2" required>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('jadwal-periksa.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
