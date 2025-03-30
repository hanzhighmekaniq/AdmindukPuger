<div class="h-20 lg:h-28 w-full bg-red-50">

</div>
<nav class="fixed top-0 z-50 w-full bg-white">
    <div class="px-3 h-24 items-center flex justify-between py-4 lg:px-5 lg:pl-12">
        <div class="flex items-center justify-center rtl:justify-center">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            <a href="{{ route('dashboard') }}" class="flex justify-center ms-2 lg:ms-12">
                <div class="items-center flex flex-col leading-none ">
                    <span
                        class="text-sm lg:text-2xl top-0.5 lg:top-1.5 relative  whitespace-nowrap text-black poppins-bold font-bold">Adminduk</span>
                    <span
                        class="text-md lg:text-3xl bottom-0.5 lg:bottom-1.5 text-[#06275A] relative  whitespace-nowrap poppins-bold font-bold">PUGER</span>
                </div>
            </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3 mr-2xx   ">
                <div>
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        <svg class="w-8 h-8 lg:w-10 lg:h-10 rounded-full bg-gray-300 text-gray-600 p-1"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="8" r="4" fill="currentColor" />
                            <path fill="currentColor" d="M4 20c0-4 4-6 8-6s8 2 8 6H4z" />
                        </svg>
                    </button>
                </div>
                <div class="z-50 hidden my-4 text-base list-none bg-slate-300 divide-y divide-gray-100 rounded-xl shadow-sm"
                    id="dropdown-user">
                    <div class="px-4 py-3 border" role="none">
                        @auth
                            <p class="text-sm text-gray-900" role="none">
                                {{ Auth::user()->name }} <!-- Menampilkan Nama User -->
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                {{ Auth::user()->email }} <!-- Menampilkan Email User -->
                            </p>
                        @else
                            <p class="text-sm text-gray-900" role="none">
                                Guest
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                -
                            </p>
                        @endauth
                    </div>

                    <ul class="border" role="none">
                        {{-- <li>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Dashboard</a>
                        </li> --}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">
                                    Log out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
