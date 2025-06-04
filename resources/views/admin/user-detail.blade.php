<x-AppLayout>
    <div class="pb-8 lg:py-0">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-3xl poppins-bold pb-1">Detail User</p>
            </div>
            <a href="{{ route('user.index') }}" class="px-6 py-2 bg-blue-700 text-black rounded-lg shadow hover:bg-gray-800">Kembali</a>
        </div>
        <div class="bg-white rounded-xl shadow p-6 mt-4">
            <table class="w-full text-sm text-left text-gray-700 mb-6">
                <tr>
                    <th class="w-1/4 font-semibold">ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th class="font-semibold">Nama</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th class="font-semibold">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th class="font-semibold">No. KK</th>
                    <td>{{ $user->nokk }}</td>
                </tr>
                <tr>
                    <th class="font-semibold">NIK</th>
                    <td>{{ $user->nik }}</td>
                </tr>
                <tr>
                    <th class="font-semibold">Alamat</th>
                    <td>{{ $user->address ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="font-semibold">Nomor Telepon</th>
                    <td>{{ $user->phone ?? '-' }}</td>
                </tr>
            </table>
            <div class="mt-8">
                <p class="poppins-semibold text-[#06275A] text-lg mb-2">Riwayat Pengajuan</p>
                <div class="relative overflow-x-auto rounded-xl">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Pemohon</th>
                                <th class="px-4 py-3">NIK</th>
                                <th class="px-4 py-3">Layanan</th>
                                <th class="px-4 py-3">Tanggal Pengajuan</th>
                                <th class="px-4 py-3">Status</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($submissions as $submission)
                                <tr class="bg-white border-b border-gray-200">
                                    <td class="px-4 py-2">{{ $submission->id }}</td>
                                    <td class="px-4 py-2">{{ $submission->name }}</td>
                                    @php
    $data = json_decode($submission->data, true);
@endphp

<td class="px-4 py-2">{{ $data['nik'] ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $submission->type }}</td>
                                    <td class="px-4 py-2">{{ $submission->created_at->format('Y-m-d') }}</td>
                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 rounded text-xs font-semibold {{ $submission->status == 'Diproses' ? 'bg-yellow-200 text-yellow-800' : ($submission->status == 'Disetujui' ? 'bg-blue-200 text-blue-800' : ($submission->status == 'Selesai' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800')) }}">
                                            {{ $submission->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-4 text-center">Belum ada pengajuan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-AppLayout>
