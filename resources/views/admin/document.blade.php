<x-AppLayout>
    <div class="pb-8 lg:py-0 lg:fixed lg:top-4 z-[50]">
        <p class="text-3xl poppins-bold pb-1">Document</p>
        <p class="poppins-regular">Ini adalah semua data document</p>
    </div>
    <div class="space-y-2">
        <div class="flex justify-between space-x-2">
            <div class="flex justify-start">

                <button data-modal-target="modal-add-document" data-modal-toggle="modal-add-document"
                    class="flex items-center gap-2 px-4 py-2 text-white bg-blue-600 rounded-lg shadow-md
                       hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Tambah Dokumen</span>
                </button>
            </div>
            <div class="flex justify-center items-center">

                <!-- Form Pencarian -->
                <form action="{{ route('document.index') }}" method="GET" class="flex items-center w-full max-w-md">
                    <div class="relative w-full">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari Dokumen..."
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                       focus:border-blue-500 block w-full p-2.5 pr-10">
                        <button type="submit" class="absolute inset-y-0 right-2 flex items-center">
                            <svg class="w-5 h-5 text-gray-500 hover:text-gray-700 transition" aria-hidden="true"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </div>
                </form>


            </div>

        </div>
        <div class=" w-full h-auto bg-gray-200 rounded-sm rounded-t-xl">
            <div class="p-4">
                <p class="poppins-semibold text-[#06275A] text-xl pl-2">Daftar Document</p>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Document
                            </th>
                            <th scope="col" class="px-6 py-3">
                                File
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                Tanggal Uplaud
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                Tanggal Update
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doc as $document)
                            <tr class="bg-white border-b border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    001
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $document->name }}
                                </th>
                                <td class="px-6 py-4">
                                    <a href="{{ asset('storage/' . $document->location) }}"
                                        class="text-blue-600 underline">
                                        Download PDF
                                    </a>
                                </td>
                                <td class="text-center px-6 py-4">
                                    {{ $document->created_at }}
                                </td>
                                <td class="text-center px-6 py-4">
                                    {{ $document->updated_at }}
                                </td>
                                <td class="text-center items-center px-6 py-4">
                                    <div class="flex justify-center">
                                        <button data-modal-target="modal-update-document-{{ $document->id }}"
                                            data-modal-toggle="modal-update-document-{{ $document->id }}" type="button"
                                            class="p-1 flex-shrink-0">
                                            <img class="w-auto h-6 lg:h-7 object-contain"
                                                src="{{ asset('img/edit-icon.png') }}" alt="Edit">
                                        </button>
                                        <button data-modal-target="modal-delete-document-{{ $document->id }}"
                                            data-modal-toggle="modal-delete-document-{{ $document->id }}"
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
            </div>

        </div>
        <div class="mt-4 px-4">
            {{ $doc->links() }}
        </div>
    </div>

    <!-- Main modal -->
    <div id="modal-add-document" tabindex="-1" data-modal-backdrop="static" aria-hidden="true"
        class="hidden fixed inset-0 z-[999] justify-center items-center w-full bg-black bg-opacity-50 backdrop-blur-sm">
        <div class="relative p-6 w-full max-w-md bg-white rounded-lg shadow-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Tambah Dokumen</h3>
                <button type="button"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center"
                    data-modal-hide="modal-add-document">
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
                <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="document_name" class="block text-sm font-medium text-gray-900">Nama
                            Dokumen</label>
                        <input type="text" name="name" id="document_name" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan nama dokumen">
                    </div>
                    <div class="mb-4">
                        <label for="document_location" class="block text-sm font-medium text-gray-900">Lokasi
                            Dokumen</label>
                        <input type="file" name="location" id="document_location" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" data-modal-hide="modal-add-document"
                            class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-100">
                            Batal
                        </button>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Update Document -->
    @foreach ($doc as $document)
        <div id="modal-update-document-{{ $document->id }}" tabindex="-1" data-modal-backdrop="static"
            aria-hidden="true"
            class="hidden fixed inset-0 z-[999] justify-center items-center w-full bg-black bg-opacity-50 backdrop-blur-sm">
            <div class="relative p-6 w-full max-w-md bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">Edit Dokumen</h3>
                    <button type="button"
                        class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center"
                        data-modal-hide="modal-update-document-{{ $document->id }}">
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
                    <form action="{{ route('document.update', $document->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Dokumen -->
                        <div class="mb-4">
                            <label for="update_document_name_{{ $document->id }}"
                                class="block text-sm font-medium text-gray-900">
                                Nama Dokumen
                            </label>
                            <input type="text" name="name" id="update_document_name_{{ $document->id }}"
                                value="{{ $document->name }}" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan nama dokumen">
                        </div>

                        <!-- Lokasi Dokumen (Upload File Baru) -->
                        <div class="mb-4">
                            <label for="update_document_location_{{ $document->id }}"
                                class="block text-sm font-medium text-gray-900">
                                Ganti Dokumen (Opsional)
                            </label>
                            <input type="file" name="location" id="update_document_location_{{ $document->id }}"
                                class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <small class="text-gray-600">Kosongkan jika tidak ingin mengganti file.</small>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-end space-x-2">
                            <button type="button" data-modal-hide="modal-update-document-{{ $document->id }}"
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-100">
                                Batal
                            </button>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Modal Delete Document -->
    @foreach ($doc as $document)
        <div id="modal-delete-document-{{ $document->id }}" tabindex="-1" data-modal-backdrop="static"
            aria-hidden="true"
            class="hidden fixed inset-0 z-[999] justify-center items-center w-full bg-black bg-opacity-50 backdrop-blur-sm">
            <div class="relative p-6 w-full max-w-md bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">Hapus Dokumen</h3>
                    <button type="button"
                        class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center"
                        data-modal-hide="modal-delete-document-{{ $document->id }}">
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
                    <p class="text-gray-700">Apakah Anda yakin ingin menghapus dokumen ini? Tindakan ini tidak dapat
                        dibatalkan.</p>
                    <form id="form-delete-document" action="{{ route('document.destroy', $document->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-end space-x-2">
                            <button type="button" data-modal-hide="modal-delete-document-{{ $document->id }}"
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
