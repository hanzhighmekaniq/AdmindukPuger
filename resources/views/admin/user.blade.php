<x-AppLayout>
    <div class="pb-8 lg:py-0 lg:fixed lg:top-4 z-[50]">
        <p class="text-3xl poppins-bold pb-1">Pengguna</p>
        <p class="poppins-regular">Ini adalah semua data Pengguna</p>
    </div>
    <div class="space-y-2">
        <div class="flex justify-end space-x-2">
            <div class="flex justify-center items-center">
                <div class="flex justify-center items-center">
                    <form action="{{ route('user.index') }}" method="GET" class="flex items-center w-full max-w-md">
                        <div class="relative w-full">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari Pengguna..."
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

        </div>
        <div class="w-full h-auto bg-gray-200 rounded-t-xl">
            <div class="p-4">
                <p class="poppins-semibold text-[#06275A] text-xl pl-2">Daftar Pengguna</p>
            </div>
            <div class="relative overflow-x-auto">

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                Dibuat
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                Update
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse  ($user as $users)
                            <tr class="bg-white border-b  border-gray-200">
                                <th scope="row"
                                    class=" lg:px-6 lg:py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $users->id }}
                                </th>
                                <th scope="row"
                                    class=" lg:px-6 lg:py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $users->name }}
                                </th>
                                <td class="underline  lg:px-6 lg:py-4">
                                    {{ $users->email }}
                                </td>
                                <td class="text-center  lg:px-6 lg:py-4">
                                    {{ $users->created_at }}
                                </td>
                                <td class="text-center  lg:px-6 lg:py-4">
                                    {{ $users->updated_at }}
                                </td>

                                <td class="text-center px-6 py-4">
                                    <div class="flex flex-row justify-center">
                                        <a href="{{ route('user.detail', $users->id) }}"
                                            class="p-1 flex-shrink-0">
                                            <img class="w-auto h-6 lg:h-6 object-contain"
                                                src="{{ asset('img/info-icon.png') }}" alt="Detail">
                                        </a>
                                        <button type="button"
                                            data-modal-target="modal-delete-user-{{ $users->id }}"
                                            data-modal-toggle="modal-delete-user-{{ $users->id }}"
                                            class="p-1
                                            flex-shrink-0">
                                            <img class="w-auto h-5 lg:h-6 object-contain"
                                                src="{{ asset('img/delete-icon.png') }}" alt="Delete">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 mx-auto text-center">Tidak ada data</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4 px-4">
            {{ $user->links() }}
        </div>
    </div>
</x-AppLayout>


<!-- Modal toggle -->

@foreach ($user as $users)
    <!-- Main modal -->
    <div id="modal-edit-user-{{ $users->id }}" tabindex="-1" data-modal-backdrop="static" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[999] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-5 backdrop-blur-[1px]">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit Email
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="modal-edit-user-{{ $users->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form action="{{ route('user.update', $users->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-900">New Email</label>
                            <input type="email" name="email" id="email" value="{{ $users->email }}" required
                                class="mt-1 p-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" data-modal-hide="modal-edit-user-{{ $users->id }}"
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-100">
                                Cancel
                            </button>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($user as $users)
    <div id="modal-delete-user-{{ $users->id }}" tabindex="-1" data-modal-backdrop="static" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[999] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-5 backdrop-blur-[1px]">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-red-600">
                        Hapus Akun?
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="modal-delete-user-{{ $users->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="p-4 md:p-5 text-center">
                    <p class="text-gray-700">Apakah Anda yakin ingin menghapus akun <b>{{ $users->name }}</b>?</p>
                    <div class="flex justify-center mt-4 space-x-2">
                        <button type="button" data-modal-hide="modal-delete-user-{{ $users->id }}"
                            class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-100">
                            No
                        </button>
                        <form action="{{ route('user.destroy', $users->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Yes, Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
