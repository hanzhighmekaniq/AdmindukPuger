<aside id="logo-sidebar"

    class="fixed top-20 left-0 z-50 w-80 h-screen pt-10 transition-transform -translate-x-full bg-white lg:translate-x-0"

    aria-label="Sidebar">
    <div class="h-full pl-8 pr-8 lg:pr-0 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg group
                          {{ request()->is('dashboard') ? 'bg-[#C3E9FF] text-blue-900' : 'text-gray-900 hover:bg-[#C3E9FF]' }}">

                    <img class="w-6 h-auto object-contain" src="{{ asset('img/beranda/dashboard-icon.png') }}"
                        alt="Dashboard Icon">

                    <span class="ms-4 text-xl poppins-regular">Dashboard</span>
                </a>
            </li>

            <li>

                <a href="{{ route('submission.index') }}"
                    class="flex items-center p-2 rounded-lg group
                          {{ request()->is('submission*') ? 'bg-[#C3E9FF] text-blue-900' : 'text-gray-900 hover:bg-[#C3E9FF]' }}">
                    <img class="w-6 h-auto object-contain " src="{{ asset('img/beranda/formulir-icon.png') }}"
                        alt="">
                    <span class="flex-1 ms-4  text-xl poppins-regular">Pengajuan</span>
                    @php
                        $countProses = \App\Models\Submission::where('status', 'Diproses')->count();
                    @endphp
                    <span
                        class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-yellow-800 bg-yellow-200 rounded-full">
                        {{ $countProses }}
                    </span>
                    {{-- <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">Pro</span> --}}
                </a>
            </li>

            <li>
                <a href="{{ route('document.index') }}"
                    class="flex items-center p-2 rounded-lg group
                          {{ request()->is('document*') ? 'bg-[#C3E9FF] text-blue-900' : 'text-gray-900 hover:bg-[#C3E9FF]' }}">
                    <img class="w-6 h-auto object-contain" src="{{ asset('img/beranda/document-icon.png') }}"
                        alt="">
                    <span class="flex-1 ms-4 poppins-regular text-xl">Document</span>
                    {{-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">3</span> --}}
                </a>
            </li>

            <li>
                <a href="{{ route('user.index') }}"
                    class="flex items-center p-2 rounded-lg group
                          {{ request()->is('user*') ? 'bg-[#C3E9FF] text-blue-900' : 'text-gray-900 hover:bg-[#C3E9FF]' }}">
                    <svg class="shrink-0 w-6 h-auto text-[#06275A] transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ms-4 poppins-regular text-xl">Pengguna</span>
                </a>
            </li>


        </ul>
    </div>

</aside>
