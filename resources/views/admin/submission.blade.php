<x-AppLayout>
    <div class="pb-8 lg:py-0 lg:fixed lg:top-4 z-[50]">
        <p class="text-3xl poppins-bold pb-1">Pengajuan</p>
        <p class="poppins-regular">Ini adalah semua data pengajuan</p>
    </div>
    <div class="space-y-2">
        <form id="filterForm" class="md:flex justify-end space-x-0 space-y-1 md:space-y-0 md:space-x-1">
            <!-- Dropdown Type -->
            <div class="flex justify-end items-center flex-1 md:flex-grow-0">
                <select id="typeFilter" name="type"
                    class="border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full sm:max-w-60 md:max-w-none md:w-auto p-2.5">
                    <option value="">Semua Jenis</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->name }}" {{ request('type') == $type->name ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
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
                    <option value="Diperoses" {{ request('status') == 'Diperoses' ? 'selected' : '' }}>Diproses</option>
                </select>
            </div>

            <!-- Input Search dengan Ikon -->
            <div class="flex justify-end items-center space-x-2">
                <div class="relative sm:max-w-60 max-w-none w-full">
                    <input type="text" id="searchFilter" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10"
                        placeholder="Cari Nama..." value="{{ request('name') }}" />
                    <!-- Ikon Search -->
                    <button id="searchBtn" type="button"
                        class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-blue-500">
                        🔍
                    </button>
                </div>
            </div>
        </form>

        <script>
            document.querySelectorAll('#typeFilter, #statusFilter').forEach(element => {
                element.addEventListener('change', function() {
                    document.getElementById('filterForm').submit();
                });
            });

            // Eksekusi search hanya jika tekan Enter atau klik ikon 🔍
            document.getElementById('searchFilter').addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Mencegah reload default
                    document.getElementById('filterForm').submit();
                }
            });

            document.getElementById('searchBtn').addEventListener('click', function() {
                document.getElementById('filterForm').submit();
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
                            <th scope="col" class="text-center px-6 py-3">Status</th>
                            <th scope="col" class="text-center px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = ($submissions->currentPage() - 1) * $submissions->perPage() + 1; @endphp

                        @forelse($submissions as $submission)
                            <tr class="bg-white border-b border-gray-200">
                                <td class="px-6 py-4">{{ $no++ }}</td>
                                <td class="px-6 py-4">{{ $submission->name ?? 'Tidak Diketahui' }}</td>
                                <td class="px-6 py-4">{{ $submission->type->name ?? 'Tidak Diketahui' }}</td>

                                <td class="text-center px-6 py-4">
                                    {{ \Carbon\Carbon::parse($submission->created_at)->format('d-m-Y') }}
                                </td>
                                <td class="text-center px-6 py-4">
                                    <span
                                        class="px-2 py-1 rounded-lg text-xs font-medium
                                        {{ $submission->status == 'Disetujui' ? 'bg-green-200 text-green-800' : ($submission->status == 'Ditolak' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                                        {{ $submission->status }}
                                    </span>
                                </td>
                                <td class="text-center items-center px-6 py-4">
                                    <div class="flex justify-center">
                                        <button data-modal-target="modal-update-submission-{{ $submission->id }}"
                                            data-modal-toggle="modal-update-submission-{{ $submission->id }}"
                                            type="button" class="p-1 flex-shrink-0">
                                            <img class="w-auto h-6 lg:h-7 object-contain"
                                                src="{{ asset('img/edit-icon.png') }}" alt="Edit">
                                        </button>
                                        <button data-modal-target="modal-delete-submission-{{ $submission->id }}"
                                            data-modal-toggle="modal-delete-submission-{{ $submission->id }}"
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




    <!-- Modal Update Document -->
    @foreach ($submissions as $submission)
        <div id="modal-update-submission-{{ $submission->id }}" tabindex="-1" data-modal-backdrop="static"
            aria-hidden="true"
            class="hidden fixed inset-0 z-[999] justify-center items-center w-full bg-black bg-opacity-50 backdrop-blur-sm">
            <div class="relative p-6 w-full max-w-md bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">Update Status</h3>
                    <button type="button"
                        class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center"
                        data-modal-hide="modal-update-submission-{{ $submission->id }}">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="pt-4">
                    <!-- Nama Pemohon -->
                    <div class="mb-4">
                        <label for="update_submission_name_{{ $submission->name }}"
                            class="block text-sm font-medium text-gray-900">
                            Nama Pemohon
                        </label>
                        <input disabled name="name" id="update_submission_name_{{ $submission->name }}"
                            value="{{ $submission->name }}" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500
               bg-gray-200 text-gray-500 cursor-not-allowed"
                            placeholder="Masukkan nama dokumen">
                    </div>

                    <!-- Jenis -->
                    <div class="mb-4">
                        <label for="update_submission_type_{{ $submission->type->name }}"
                            class="block text-sm font-medium text-gray-900">
                            Jenis
                        </label>
                        <input disabled name="name" id="update_submission_type_{{ $submission->type->name }}"
                            value="{{ $submission->type->name }}" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500
               bg-gray-200 text-gray-500 cursor-not-allowed"
                            placeholder="Masukkan nama dokumen">
                    </div>
                    <form action="{{ route('submission.update', $submission->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Dropdown Status -->
                        <div class="mb-4">
                            <label for="update_submission_status_{{ $submission->id }}"
                                class="block text-sm font-medium text-gray-900">
                                Status
                            </label>
                            <select name="status" id="update_submission_status_{{ $submission->id }}"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="Disetujui" {{ $submission->status == 'Disetujui' ? 'selected' : '' }}>
                                    Disetujui</option>
                                <option value="Ditolak" {{ $submission->status == 'Ditolak' ? 'selected' : '' }}>
                                    Ditolak</option>
                                <option value="Diproses" {{ $submission->status == 'Diproses' ? 'selected' : '' }}>
                                    Diproses</option>
                            </select>
                        </div>

                        <!-- Input Alasan Ditolak (Hidden by Default) -->
                        <div id="rejectionReasonContainer_{{ $submission->id }}" class="mb-4 hidden">
                            <label for="rejectionReason_{{ $submission->id }}"
                                class="block text-sm font-medium text-gray-900">
                                Alasan Penolakan
                            </label>
                            <textarea name="notes" id="rejectionReason_{{ $submission->id }}"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                                placeholder="Masukkan alasan penolakan...">{{ $submission->notes ?? '' }}</textarea>
                        </div>



                        <!-- Tombol Aksi -->
                        <div class="flex justify-end space-x-2 pt-4">
                            <button type="button" data-modal-hide="modal-update-submission-{{ $submission->id }}"
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-100">
                                Batal
                            </button>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const statusDropdown = document.getElementById("update_submission_status_{{ $submission->id }}");
                            const reasonContainer = document.getElementById("rejectionReasonContainer_{{ $submission->id }}");

                            function toggleReasonField() {
                                if (statusDropdown.value === "Ditolak") {
                                    reasonContainer.classList.remove("hidden");
                                } else {
                                    reasonContainer.classList.add("hidden");
                                }
                            }

                            // Panggil saat halaman dimuat (untuk mempertahankan keadaan)
                            toggleReasonField();

                            // Tambahkan event listener untuk perubahan status
                            statusDropdown.addEventListener("change", toggleReasonField);
                        });
                    </script>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Modal Delete Document -->
    @foreach ($submissions as $submission)
        <div id="modal-delete-submission-{{ $submission->id }}" tabindex="-1" data-modal-backdrop="static"
            aria-hidden="true"
            class="hidden fixed inset-0 z-[999] justify-center items-center w-full bg-black bg-opacity-50 backdrop-blur-sm">
            <div class="relative p-6 w-full max-w-md bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">Hapus Dokumen</h3>
                    <button type="button"
                        class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center"
                        data-modal-hide="modal-delete-submission-{{ $submission->id }}">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="pt-4">
                    <p class="text-gray-700">Apakah Anda yakin ingin menghapus permohonan ini? Tindakan ini tidak dapat
                        dibatalkan.</p>
                    <form id="form-delete-submission-{{ $submission->id }}"
                        action="{{ route('submission.destroy', $submission->id) }}" method="POST" class="mt-4">

                        @csrf
                        @method('DELETE')
                        <div class="flex justify-end space-x-2">
                            <button type="button" data-modal-hide="modal-delete-submission-{{ $submission->id }}"
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-100">
                                Batal
                            </button>
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Hapus
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-AppLayout>
