<x-AppLayout>

    <div class="pb-8 lg:py-0 lg:fixed lg:top-4 z-[50]">
        <p class="text-3xl poppins-bold pb-1">Dashboard</p>
        <p class="poppins-regular">Detailed Information About Population Administration</p>
    </div>
    <div class="grid grid-cols-1 2xl:grid-cols-12 gap-8">
        <div class="lg:col-span-9 flex flex-col">
            <div class="flex justify-center">
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 w-full">
                    <div class="p-8 shadow-xl shadow-gray-400 rounded-lg bg-[#D7E3FD] text-[#06275A]">
                        <p class="text-xl poppins-semibold">Jumlah Pengajuan</p>
                        <div class="flex justify- space-x-4 items-center ">
                            <img class="text-xl poppins-semibold object-contain"
                                src="{{ asset('img/beranda/users-pengajuan.png') }}" alt="">
                            <h1 class="text-2xl poppins-bold">100</h1>
                        </div>
                    </div>
                    <div class="p-8 shadow-xl shadow-gray-400 rounded-lg bg-[#CBFFE3] text-[#041C01]">
                        <p class="text-xl poppins-semibold">Jumlah Pengajuan</p>
                        <div class="flex justify- space-x-4 items-center">
                            <img class="text-xl poppins-semibold" src="{{ asset('img/beranda/users-setuju.png') }}"
                                alt="">
                            <h1 class="text-2xl poppins-bold">100</h1>
                        </div>
                    </div>
                    <div class="p-8 shadow-xl shadow-gray-400 rounded-lg bg-[#FAE0DF] text-[#E90808]">
                        <p class="text-xl poppins-semibold">Jumlah Pengajuan</p>
                        <div class="flex justify- space-x-4 items-center">
                            <img class="text-xl poppins-semibold" src="{{ asset('img/beranda/users-tolak.png') }}"
                                alt="">
                            <h1 class="text-2xl poppins-bold">100</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center pt-8 ">
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
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jenis
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b  border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        Apple MacBook Pro 17"
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        Apple MacBook Pro 17"
                                    </th>
                                    <td class="px-6 py-4">
                                        Silver
                                    </td>
                                    <td class="px-6 py-4">
                                        Laptop
                                    </td>
                                    <td class="px-6 py-4">
                                        $2999
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="lg:col-span-3">
            <div class="h-full w-full bg-gray-200 rounded-sm shadow-md shadow-slate-400">
                <div class="flex flex-col">
                    <div class="p-4 grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-1 gap-4">
                        <div>
                            <div class="flex justify-start items-center pb-2">
                                <p class="poppins-semibold text-xl text-[#06275A]">Pengajuan Terbaru</p>
                            </div>
                            <div class="p-4 shadow-md shadow-gray-400 bg-white rounded-xl poppins-medium">
                                <p class="border-b border-gray-300 pb-2">Abdul Salim</p>

                                <div class="flex justify-between items-center border-b border-gray-300 py-3">
                                    <p>KK</p>
                                    <a class="px-8 py-1 text-xs bg-[#06275A] text-white rounded-xl" href="/">Lihat
                                        Detail</a>
                                </div>

                                <div class="flex justify-between items-center pt-2">
                                    <p>12.00 AM</p>
                                    <p class="px-8">08-11-2004</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



</x-AppLayout>
