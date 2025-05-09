<x-AppLayout>

    <div class="pb-8 lg:py-0 lg:fixed lg:top-4 z-[50]">
        <p class="text-3xl poppins-bold pb-1">Dashboard</p>
        <p class="poppins-regular">Detailed Information About Population Administration</p>
    </div>
    <div class="lg:col-span-9 flex flex-col">
        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8 w-full">
                <!-- Jumlah Semua Pengajuan -->
                <div class="p-8 shadow-xl shadow-gray-400 rounded-lg bg-[#D7E3FD] text-[#06275A]">
                    <p class="text-base xl:text-xl poppins-semibold">Jumlah Pengajuan</p>
                    <div class="flex justify-between space-x-4 items-center">
                        <img class="object-contain" src="{{ asset('img/beranda/users-pengajuan.png') }}" alt="">
                        <h1 class="text-lg xl:text-2xl poppins-bold count-up" data-target="{{ $allCount }}">0</h1>
                    </div>
                </div>

                <!-- Jumlah Disetujui -->
                <div class="p-8 shadow-xl shadow-gray-400 rounded-lg bg-[#CBFFE3] text-[#041C01]">
                    <p class="text-base xl:text-xl poppins-semibold">Jumlah Disetujui</p>
                    <div class="flex justify-between space-x-4 items-center">
                        <img class="object-contain" src="{{ asset('img/beranda/users-setuju.png') }}" alt="">
                        <h1 class="text-lg xl:text-2xl poppins-bold count-up" data-target="{{ $disetujuiCount }}">0</h1>
                    </div>
                </div>

                <!-- Jumlah Ditolak -->
                <div class="p-8 shadow-xl shadow-gray-400 rounded-lg bg-[#FAE0DF] text-[#E90808]">
                    <p class="text-base xl:text-xl poppins-semibold">Jumlah Ditolak</p>
                    <div class="flex justify-between space-x-4 items-center">
                        <img class="object-contain" src="{{ asset('img/beranda/users-tolak.png') }}" alt="">
                        <h1 class="text-lg xl:text-2xl poppins-bold count-up" data-target="{{ $ditolakCount }}">0</h1>
                    </div>
                </div>

                <!-- Jumlah Diproses -->
                <div class="p-8 shadow-xl shadow-gray-400 rounded-lg bg-[#FFF7CD] text-[#8A7300]">
                    <p class="text-base xl:text-xl poppins-semibold">Jumlah Diproses</p>
                    <div class="flex justify-between space-x-4 items-center">
                        <img class="object-contain" src="{{ asset('img/beranda/users-diproses.png') }}" alt="">
                        <h1 class="text-lg xl:text-2xl poppins-bold count-up" data-target="{{ $diprosesCount }}">0</h1>
                    </div>
                </div>
            </div>

            <!-- Script Animasi Count-Up -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const counters = document.querySelectorAll('.count-up');

                    const observer = new IntersectionObserver(entries => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const counter = entry.target;
                                const target = +counter.getAttribute('data-target');
                                let start = 0;
                                const duration = 2000; // 2 detik
                                const increment = target / (duration / 16); // hitungan 60 FPS

                                function updateCount() {
                                    start += increment;
                                    if (start < target) {
                                        counter.innerText = Math.floor(start);
                                        requestAnimationFrame(updateCount);
                                    } else {
                                        counter.innerText = target;
                                    }
                                }

                                updateCount();
                                observer.unobserve(counter); // Hanya animasi sekali
                            }
                        });
                    }, {
                        threshold: 1.0
                    });

                    counters.forEach(counter => observer.observe(counter));
                });
            </script>

        </div>


        <div class="flex justify-center pt-8 ">
            <div class="shadow-md shadow-gray-400 w-full h-auto bg-gray-200 rounded-sm p-4">
                <div class="pb-2">
                    <p class="poppins-semibold text-[#06275A] text-xl pl-2">Daftar Pengajuan</p>
                </div>
                <div class="relative overflow-x-auto  rounded-xl">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID Pengajuan</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Jenis</th>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submissions as $index => $submission)
                                <tr class="bg-white border-b border-gray-200">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $submission->name ?? 'Tidak Ada Nama' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $submission->type ?? 'Tidak Ada Jenis' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $submission->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-lg
                                        {{ $submission->status == 'Disetujui' ? 'bg-blue-200 text-blue-800' : '' }}
                                        {{ $submission->status == 'Selesai' ? 'bg-green-200 text-green-800' : '' }}
                                        {{ $submission->status == 'Ditolak' ? 'bg-red-200 text-red-800' : '' }}
                                        {{ $submission->status == 'Diproses' ? 'bg-yellow-200 text-yellow-800' : '' }}">
                                            {{ $submission->status }}
                                        </span>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>




</x-AppLayout>
