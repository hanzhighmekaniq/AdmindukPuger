<x-AppLayout>
    <div class="pb-8 lg:py-0 lg:fixed lg:top-4 z-[50]">
        <p class="text-3xl poppins-bold pb-1">Pengajuan</p>
        <p class="poppins-regular">Ini adalah semua data pengajuan</p>
    </div>
    <div class="space-y-2">
        <div class="md:flex justify-end space-x-0 space-y-1 md:space-y-0 md:space-x-1">
            <div class="flex justify-end items-center flex-1 md:flex-grow-0">
                <select id="layanan"
                    class="border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full sm:max-w-60 md:max-w-none md:w-auto p-2.5">
                    <option selected value="dashboard">Layanan</option>
                    <option value="settings">Settings</option>
                    <option value="earnings">Earnings</option>
                    <option value="signout">Sign out</option>
                </select>
            </div>

            <div class="flex justify-end items-center flex-1 md:flex-grow-0">
                <select id="status"
                    class="border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full sm:max-w-60 md:max-w-none md:w-auto p-2.5">
                    <option value="dashboard">Dashboard</option>
                    <option value="settings">Settings</option>
                    <option value="earnings">Earnings</option>
                    <option value="signout">Sign out</option>
                </select>
            </div>

            <div class="flex justify-end items-center ">
                <div class="flex items-center sm:max-w-60 max-w-none w-full ">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Pencarian..." required />
                    </div>
                </div>
            </div>
        </div>

        <div class="shadow-md shadow-gray-400 w-full h-auto bg-gray-200 rounded-sm p-4">
            <div class="pb-2">
                <p class="poppins-semibold text-[#06275A] text-xl pl-2">Daftar Pengajuan</p>
            </div>
            <div class="relative overflow-x-auto  rounded-xl">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pemohon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="text-center px-6 py-3">
                                Status
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
                                Zidan Ferdiansyah
                            </th>
                            <td class="px-6 py-4">
                                KTP
                            </td>
                            <td class="text-center px-6 py-4">
                                02-02-2025
                            </td>
                            <td class="text-center px-6 py-4">
                                <select id="status-pilih"
                                    class="text-black font-medium rounded-lg text-xs md:text-sm px-2 py-1 text-center inline-flex items-center appearance-none focus:outline-none">
                                    <option value="Disetujui">Disetujui</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Masuk">Masuk</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                            </td>

                            <td class="text-center items-center px-6 py-4">
                                <div class="flex justify-center    ">

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
