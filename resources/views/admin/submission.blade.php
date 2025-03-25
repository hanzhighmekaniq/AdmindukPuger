<x-AppLayout>

    <div class="pb-8 lg:py-0 lg:fixed lg:top-4 z-[50]">
        <p class="text-3xl poppins-bold pb-1">Pengajuan</p>
        <p class="poppins-regular">Ini adalah semua data pengajuan</p>
    </div>
    <div class="space-y-2">
        <form id="filterForm" method="GET" action="{{ route('submission.index') }}"
            class="md:flex justify-end space-x-0 space-y-1 md:space-y-0 md:space-x-1">
            <!-- Dropdown Type -->
            <div class="flex justify-end items-center flex-1 md:flex-grow-0">
                <select id="typeFilter" name="type"
                    class="border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full sm:max-w-60 md:max-w-none md:w-auto p-2.5">
                    <option value="">Semua Jenis</option>
                    <option value="KTP" {{ request('type') == 'KTP' ? 'selected' : '' }}>KTP</option>
                    <option value="Kartu Keluarga" {{ request('type') == 'Kartu Keluarga' ? 'selected' : '' }}>Kartu
                        Keluarga</option>
                    <option value="Surat Pindah" {{ request('type') == 'Surat Pindah' ? 'selected' : '' }}>Surat Pindah
                    </option>
                    <option value="Akta Kelahiran" {{ request('type') == 'Akta Kelahiran' ? 'selected' : '' }}>Akta
                        Kelahiran</option>
                    <option value="Akta Kematian" {{ request('type') == 'Akta Kematian' ? 'selected' : '' }}>Akta
                        Kematian</option>
                </select>
            </div>

            <!-- Dropdown Status -->
            <div class="flex justify-end items-center flex-1 md:flex-grow-0">
                <select id="statusFilter" name="status"
                    class="border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full sm:max-w-60 md:max-w-none md:w-auto p-2.5">
                    <option value="">Semua Status</option>
                    <option value="Disetujui" {{ request('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui
                    </option>
                    <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                </select>
            </div>

            <!-- Input Search dengan Ikon -->
            <div class="flex justify-end items-center space-x-2">
                <div class="relative sm:max-w-60 max-w-none w-full">
                    <input type="text" id="searchFilter" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10"
                        placeholder="Cari Nama..." value="{{ request('name') }}" />
                    <!-- Ikon Search -->
                    <button id="searchBtn" type="submit"
                        class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-blue-500">
                        🔍
                    </button>
                </div>
            </div>
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Ambil elemen filter
                const filterForm = document.getElementById("filterForm");
                const typeFilter = document.getElementById("typeFilter");
                const statusFilter = document.getElementById("statusFilter");
                const searchFilter = document.getElementById("searchFilter");

                // Event listener untuk dropdown Type
                typeFilter.addEventListener("change", function() {
                    filterForm.submit();
                });

                // Event listener untuk dropdown Status
                statusFilter.addEventListener("change", function() {
                    filterForm.submit();
                });

                // Event listener untuk input search (tekan Enter untuk cari)
                searchFilter.addEventListener("keypress", function(event) {
                    if (event.key === "Enter") {
                        event.preventDefault(); // Mencegah reload halaman default
                        filterForm.submit();
                    }
                });
            });
        </script>


        <div class="shadow-md shadow-gray-400 w-full h-auto bg-gray-200 rounded-sm p-4">
            <div class="pb-2">
                <p class="poppins-semibold text-[#06275A] text-xl pl-2">Daftar Pengajuan</p>
            </div>
            <div class="relative overflow-x-auto  rounded-xl">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Pemohon</th>
                            <th scope="col" class="px-6 py-3">Jenis</th>
                            <th scope="col" class="text-center px-6 py-3">Tanggal</th>
                            <th scope="col" class="text-center px-6 py-3">User</th>
                            <th scope="col" class="text-center px-6 py-3">Status</th>
                            <th scope="col" class="text-center px-6 py-3">Notes</th>
                            <th scope="col" class="text-center px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($submissions as $submission)
                            <tr class="bg-white border-b border-gray-200">
                                <td class="px-6 py-4">{{ $submissions->firstItem() + $loop->index }}</td>
                                <td class="px-6 py-4">{{ $submission->name ?? 'Tidak Diketahui' }}</td>
                                <td class="px-6 py-4">{{ $submission->type ?? 'Tidak Diketahui' }}</td>
                                <td class="px-6 py-4">{{ $submission->created_at ?? 'Tidak Diketahui' }}</td>
                                <td class="px-6 py-4">{{ $submission->user->name ?? 'Tidak Diketahui' }}</td>


                                <td class="text-center px-6 py-4">
                                    <span
                                        class="px-2 py-1 rounded-lg text-xs font-medium
                                        {{ $submission->status == 'Disetujui' ? 'bg-green-200 text-green-800' : ($submission->status == 'Ditolak' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                                        {{ $submission->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $submission->notes ?? 'Kosong' }}</td>

                                <td class="text-center items-center px-6 py-4">
                                    <div class="flex justify-center space-x-2">
                                        <button data-modal-target="info-modal-{{ $submission->id }}"
                                            data-modal-toggle="info-modal-{{ $submission->id }}" type="button"
                                            class="p-1 flex-shrink-0">
                                            <img class="w-auto h-6 lg:h-6 object-contain"
                                                src="{{ asset('img/info-icon.png') }}" alt="Detail">
                                        </button>
                                        <button data-modal-target="modal-update-{{ $submission->id }}"
                                            data-modal-toggle="modal-update-{{ $submission->id }}" type="button"
                                            class="p-1 flex-shrink-0">
                                            <img class="w-auto h-6 lg:h-7 object-contain"
                                                src="{{ asset('img/edit-icon.png') }}" alt="Edit">
                                        </button>

                                        <button data-modal-target="delete-modal-{{ $submission->id }}"
                                            data-modal-toggle="delete-modal-{{ $submission->id }}" type="button"
                                            class="p-1 flex-shrink-0">
                                            <img class="w-auto h-5 lg:h-6 object-contain"
                                                src="{{ asset('img/delete-icon.png') }}" alt="Delete">
                                        </button>

                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $submissions->links() }}
                </div>


            </div>

        </div>
    </div>

    {{-- UPDATE MODAL --}}
    @forelse ($submissions as $update)
        <!-- Main modal -->
        <div id="modal-update-{{ $update->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 z-[999] justify-center items-center w-full h-screen bg-gray-900 bg-opacity-50">
            <div class="relative p-4 w-full max-w-2xl">
                <!-- Modal content -->
                <div class="bg-white rounded-lg shadow-sm">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900">Update Status</h3>
                        <button type="button" class="text-gray-400 hover:text-gray-900"
                            data-modal-hide="modal-update-{{ $update->id }}">
                            ✖
                        </button>
                    </div>
                    <div class="p-4">
                        <!-- Informasi Nama dan Jenis -->
                        <div class="space-y-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama</label>
                                <p class="text-sm text-gray-900">{{ $update->name }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis</label>
                                <p class="text-sm text-gray-900">{{ $update->type }}</p>
                            </div>
                        </div>

                        <!-- Form untuk Update Status -->
                        <form action="{{ route('submission.update', $update->id) }}" method="POST"
                            class="mt-4 space-y-4">
                            @csrf
                            @method('PUT')

                            <!-- Pilihan Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Pilih
                                    Status</label>
                                <select id="status-{{ $update->id }}" name="status"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="Disetujui">Disetujui</option>
                                    <option value="Diproses">Diproses</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                            </div>

                            <!-- Input Catatan (Hanya jika Ditolak) -->
                            <div id="notes-field-{{ $update->id }}" class="hidden">
                                <label for="notes" class="block text-sm font-medium text-gray-700">Catatan (Hanya
                                    jika Ditolak)</label>
                                <textarea id="notes-{{ $update->id }}" name="notes"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    rows="3"></textarea>

                                <!-- Pilihan Alasan Penolakan -->
                                <div class="mt-2">
                                    <p class="text-sm font-medium text-gray-700">Pilih Alasan:</p>
                                    <ul class="space-y-1">
                                        <li class="cursor-pointer w-auto text-red-600 hover:underline"
                                            onclick="setNotes({{ $update->id }}, 'Dokumen tidak lengkap.')">📌
                                            Dokumen tidak lengkap.</li>
                                        <li class="cursor-pointer w-auto text-red-600 hover:underline"
                                            onclick="setNotes({{ $update->id }}, 'Data yang diberikan tidak valid.')">
                                            📌 Data yang diberikan tidak valid.</li>
                                        <li class="cursor-pointer w-auto text-red-600 hover:underline"
                                            onclick="setNotes({{ $update->id }}, 'Pengajuan tidak memenuhi syarat.')">
                                            📌 Pengajuan tidak memenuhi syarat.</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <button type="submit"
                                class="w-full px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                Update Status
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('status-{{ $update->id }}').addEventListener('change', function() {
                var notesField = document.getElementById('notes-field-{{ $update->id }}');
                notesField.classList.toggle('hidden', this.value !== 'Ditolak');
            });

            function setNotes(id, text) {
                document.getElementById('notes-' + id).value = text;
            }
        </script>
    @empty
    @endforelse


    {{-- DELETE MODAL --}}
    @forelse ($submissions as $delete)
        <!-- Modal Delete -->
        <div id="delete-modal-{{ $delete->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Konfirmasi Hapus
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="delete-modal-{{ $delete->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Tutup modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-4">
                        <p class="text-sm text-gray-700">Apakah Anda yakin ingin menghapus data berikut?</p>
                        <p class="text-sm font-medium text-gray-900 mt-2">{{ $delete->name }} - {{ $delete->type }}
                        </p>
                    </div>

                    <!-- Modal footer -->
                    <div class="flex justify-end p-4 border-t border-gray-200">
                        <button data-modal-hide="delete-modal-{{ $delete->id }}" type="button"
                            class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                            Batal
                        </button>
                        <form action="{{ route('submission.destroy', $delete->id) }}" method="POST" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse

    INFO MODAL
    @forelse ($submissions as $info)
        <!-- Modal Delete -->
        <div id="info-modal-{{ $info->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Syarat Pembuatan {{ $info->type }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="info-modal-{{ $info->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Tutup modal</span>
                        </button>
                    </div>

                    @foreach ($info->data as $label => $image)
                        <div class="p-4">
                            <p>{{ $label }}</p>
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $label }}"
                                class="w-20 h-20">
                        </div>
                    @endforeach


                    <!-- Modal footer -->
                    <div class="flex justify-end p-4 border-t border-gray-200">
                        <button data-modal-hide="info-modal-{{ $info->id }}" type="button"
                            class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                            Batal
                        </button>
                        <button data-modal-target="modal-update-{{ $submission->id }}"
                            data-modal-toggle="modal-update-{{ $submission->id }}" type="button"
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">
                            Update Status
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse




</x-AppLayout>
