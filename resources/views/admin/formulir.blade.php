<x-AppLayout>
    <div class="pb-8 lg:py-0 lg:fixed lg:top-4 z-[50]">
        <p class="text-3xl poppins-bold pb-1">Formulir</p>
        <p class="poppins-regular">Ini adalah data formulir</p>
    </div>
    <div class="space-y-2">
        <div class="flex justify-end space-x-2">
            <div class="flex justify-center items-center">

                <select id="status"
                    class="border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-44 p-2.5">
                    <option selectedg value="dashboard">Layanan</option>
                    <option value="settings">Settings</option>
                    <option value="earnings">Earnings</option>
                    <option value="signout">Sign out</option>
                </select>

            </div>
            <div class="flex justify-center items-center">

                <select id="status"
                    class="border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-44 p-2.5">
                    <option value="dashboard">Dashboard</option>
                    <option value="settings">Settings</option>
                    <option value="earnings">Earnings</option>
                    <option value="signout">Sign out</option>
                </select>

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
                                ID Pengajuan
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
                                <button id="dropstatus" data-dropdown-toggle="dropdown-layanan"
                                    class="text-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm bg-green-400 px-2 py-1 text-center inline-flex items-center"
                                    type="button">Pending<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                            </td>
                            <td class="text-center px-6 py-4">
                                <button>
                                    <img src="{{ asset('img/edit-icon.png') }}" alt="">
                                </button>
                                <button>
                                    <img src="{{ asset('img/delete-icon.png') }}" alt="">

                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-AppLayout>
