<x-AppLayout>
    <div class="pb-8 lg:py-0 lg:fixed lg:top-4 z-[50]">
        <p class="text-3xl poppins-bold pb-1">Document</p>
        <p class="poppins-regular">Ini adalah semua data document</p>
    </div>
    <div class="space-y-2">
        <div class="flex justify-end space-x-2">
            <div class="flex justify-center items-center">

                <form class="flex items-center max-w-sm mx-auto">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="Search branch name..." required />
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>

            </div>

        </div>
        <div class="shadow-md shadow-gray-400 w-full h-auto bg-gray-200 rounded-sm p-4">
            <div class="pb-2">
                <p class="poppins-semibold text-[#06275A] text-xl pl-2">Daftar Document</p>
            </div>
            <div class="relative overflow-x-auto  rounded-xl">
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
                                Tanggal
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b  border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                001
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                KTP
                            </th>
                            <td class="underline px-6 py-4">
                                PDF
                            </td>
                            <td class="text-center px-6 py-4">
                                02-02-2025
                            </td>

                            <td class="text-center items-center px-6 py-4">
                                <div class="flex justify-center   ">

                                    <button class="p-1 flex-shrink-0">
                                        <img class="w-auto h-6 lg:h-7 object-contain"
                                            src="{{ asset('img/edit-icon.png') }}" alt="Edit">
                                    </button>
                                    <button class="p-1 flex-shrink-0">
                                        <img class="w-auto h-5 lg:h-6 object-contain"
                                            src="{{ asset('img/delete-icon.png') }}" alt="Delete">
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-AppLayout>
