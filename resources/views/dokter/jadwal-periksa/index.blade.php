
<x-layouts.app title="Jadwal Periksa">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Jadwal Periksa
                </h1>
                <p class="text-gray-500">
                    Kelola jadwal praktik dokter.
                </p>
            </div>

            <a href="{{ route('jadwal-periksa.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                + Tambah Jadwal
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4">No.</th>
                        <th class="p-4">Hari</th>
                        <th class="p-4">Jam Mulai</th>
                        <th class="p-4">Jam Selesai</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($jadwals as $jadwal)
                        <tr class="border-t">
                            <td class="p-4">{{ $loop->iteration }}</td>
                            <td class="p-4">{{ $jadwal->hari }}</td>
                            <td class="p-4">{{ substr($jadwal->jam_mulai, 0, 5) }}</td>
                            <td class="p-4">{{ substr($jadwal->jam_selesai, 0, 5) }}</td>
                            <td class="p-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('jadwal-periksa.edit', $jadwal->id) }}"
                                       class="bg-yellow-500 text-white px-3 py-2 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('jadwal-periksa.destroy', $jadwal->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-600 text-white px-3 py-2 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                Belum ada jadwal periksa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
