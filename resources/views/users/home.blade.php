<x-LayoutUser>

    <div class="md:space-y-14 ">

        <div id="beranda" class="relative md:h-screen w-screen flex justify-center items-center bg-cover bg-center py-24 sm:py-14 md:py-0"
            style="background-image: url('{{ asset('img/bg-atas.png') }}');">
            <div class="container">
                <div class="grid grid-cols-1 xl:grid-cols-2 justify-center md:px-10">
                    <!-- Bagian Kiri -->
                    <div class="space-y-10 md:space-y-16  sm:pt-10">
                        <h1 class="text-4xl md:text-5xl font-bold poppins-bold leading-tight ">
                            Urus Administrasi Kependudukan dengan Mudah & Cepat!
                        </h1>
                        <h2 class="text-2xl md:text-3xl poppins-regular leading-relaxed ">
                            Layanan online untuk pengurusan administrasi kependudukan di Puger, tanpa ribet & tanpa
                            antre!
                            Nikmati kemudahan akses dari mana saja!
                        </h2>
                        <button
                            class="px-14 py-2 flex items-center justify-center text-white text-xs md:text-xl font-semibold bg-gradient-to-br from-[#5482B4] to-[#021124] rounded-2xl shadow-lg hover:opacity-90 transition">
                            Coba Sekarang
                        </button>
                    </div>

                    <!-- Bagian Kanan -->
                    <div class="xl:flex justify-end hidden ">
                        <img src="{{ asset('img/bg-orang.png') }}" alt=""
                            class="w-auto h-auto object-cover max-w-full">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="container">
                <div class="grid grid-cols-1 xl:grid-cols-12">
                    <div class="col-span-5 ">
                        <img class="lg:w-full lg:h-auto h-30 " src="{{ asset('img/visi-misi.png') }}" alt="">
                    </div>
                    <div class="col-span-7 flex items-center">
                        <div class=" py-20 space-y-10 ">
                            <p class="text-4xl md:text-5xl poppins-bold">Visi & Misi Kecamatan Puger</p>
                            <p class="text-2xl md:text-4xl ">Mewujudkan Kecamatan Puger yang maju, mandiri, dan
                                sejahtera
                                berbasis potensi lokal dan
                                berwawasan luas.</p>
                            <div class="space-y-10">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('img/icon-centang.png') }}" alt="" class="w-auto h-8 md:h-10">
                                    <p class="text-base md:text-2xl">Menyediakan layanan administrasi kependudukan yang
                                        cepat, mudah.
                                    </p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('img/icon-centang.png') }}" alt="" class="w-auto h-8 md:h-10">
                                    <p class="text-base md:text-2xl">Menyediakan layanan administrasi kependudukan yang
                                        cepat, mudah.
                                    </p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('img/icon-centang.png') }}" alt="" class="w-auto h-8 md:h-10">
                                    <p class="text-base md:text-2xl">Menyediakan layanan administrasi kependudukan yang
                                        cepat, mudah.
                                    </p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="beranda" class="flex md:py-14 justify-center relative bg-cover bg-center w-screen  object-contain"
            style="background-image: url('{{ asset('img/bg-bawah.png') }}');">
            <div class="container">
                <div class="space-y-10">
                    <div class="flex justify-center items-center">
                        <p class="text-3xl lg:text-5xl poppins-bold text-center">Tentang Kecamatan</p>
                    </div>
                    <div class="flex justify-center items-center lg:px-40">
                        <p class=" text-xl lg:text-4xl text-center">Kecamatan Puger merupakan salah satu kecamatan di
                            Kabupaten
                            Jember
                            yang memiliki
                            peran penting dalam administrasi kependudukan dan pelayanan masyarakat.</p>
                    </div>
                </div>
                <div class="py-20 lg:px-10">

                    <div class="swiper mySwiper ">
                        <div class="swiper-wrapper md:py-28">
                            <!-- Slide 1 -->
                            <div
                                class="swiper-slide text-center rounded-xl p-8 text-[#06275A] shadow-xl shadow-slate-500 border-2 space-y-2 ">
                                <div class="flex justify-center ">
                                    <img class="h-auto w-28" src="{{ asset('img/buku.png') }}" alt="">
                                </div>
                                <p class="poppins-bold text-xl">Wisata</p>
                                <p class="poppins-reguler text-lg">Kecamatan Puger memiliki populasi yang beragam,
                                    dengan mayoritas masyarakat
                                    berprofesi sebagai nelayan, petani,</p>
                                <div class="flex justify-center">
                                    <div class="bg-[#06275A] rounded-xl">

                                        <p class="text-white px-4 py-2">Learn More</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide text-center rounded-xl p-8 text-[#06275A] shadow-xl shadow-slate-500 border-2 space-y-2 ">
                                <div class="flex justify-center ">
                                    <img class="h-auto w-28" src="{{ asset('img/buku.png') }}" alt="">
                                </div>
                                <p class="poppins-bold text-xl">Wisata</p>
                                <p class="poppins-reguler text-lg">Kecamatan Puger memiliki populasi yang beragam,
                                    dengan mayoritas masyarakat
                                    berprofesi sebagai nelayan, petani,</p>
                                <div class="flex justify-center">
                                    <div class="bg-[#06275A] rounded-xl">

                                        <p class="text-white px-4 py-2">Learn More</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide text-center rounded-xl p-8 text-[#06275A] shadow-xl shadow-slate-500 border-2 space-y-2 ">
                                <div class="flex justify-center ">
                                    <img class="h-auto w-28" src="{{ asset('img/buku.png') }}" alt="">
                                </div>
                                <p class="poppins-bold text-xl">Wisata</p>
                                <p class="poppins-reguler text-lg">Kecamatan Puger memiliki populasi yang beragam,
                                    dengan mayoritas masyarakat
                                    berprofesi sebagai nelayan, petani,</p>
                                <div class="flex justify-center">
                                    <div class="bg-[#06275A] rounded-xl">

                                        <p class="text-white px-4 py-2">Learn More</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide text-center rounded-xl p-8 text-[#06275A] shadow-xl shadow-slate-500 border-2 space-y-2 ">
                                <div class="flex justify-center ">
                                    <img class="h-auto w-28" src="{{ asset('img/buku.png') }}" alt="">
                                </div>
                                <p class="poppins-bold text-xl">Wisata</p>
                                <p class="poppins-reguler text-lg">Kecamatan Puger memiliki populasi yang beragam,
                                    dengan mayoritas masyarakat
                                    berprofesi sebagai nelayan, petani,</p>
                                <div class="flex justify-center">
                                    <div class="bg-[#06275A] rounded-xl">

                                        <p class="text-white px-4 py-2">Learn More</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-slide text-center rounded-xl p-8 text-[#06275A] shadow-xl shadow-slate-500 border-2 space-y-2 ">
                                <div class="flex justify-center ">
                                    <img class="h-auto w-28" src="{{ asset('img/buku.png') }}" alt="">
                                </div>
                                <p class="poppins-bold text-xl">Wisata</p>
                                <p class="poppins-reguler text-lg">Kecamatan Puger memiliki populasi yang beragam,
                                    dengan mayoritas masyarakat
                                    berprofesi sebagai nelayan, petani,</p>
                                <div class="flex justify-center">
                                    <div class="bg-[#06275A] rounded-xl">

                                        <p class="text-white px-4 py-2">Learn More</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div
                            class="z-[50] swiper-button-prev-custom absolute left-4 top-1/2 -translate-y-1/2 bg-[#06275A] text-white p-2 md:p-3 rounded-full cursor-pointer hover:bg-black transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-6 md:w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>

                        <div
                            class="z-[50] swiper-button-next-custom absolute right-4 top-1/2 -translate-y-1/2 bg-[#06275A] text-white p-2 md:p-3 rounded-full cursor-pointer hover:bg-black transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-6 md:w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                        <!-- Script Swiper -->
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var swiper = new Swiper(".mySwiper", {
                                    slidesPerView: 1,
                                    spaceBetween: 20,
                                    slidesPerGroup: 1,
                                    loop: true,
                                    navigation: {
                                        nextEl: ".swiper-button-next-custom",
                                        prevEl: ".swiper-button-prev-custom",
                                    },
                                    pagination: {
                                        el: ".swiper-pagination",
                                        clickable: true,
                                    },
                                    autoplay: {
                                        delay: 3000,
                                        disableOnInteraction: false,
                                    },
                                    breakpoints: {
                                        1024: { // Sama seperti md di Tailwind (min-width: 768px)
                                            slidesPerView: 2, // Tampilkan 2 slide jika layar md ke atas
                                        },
                                        1280: { // Sama seperti xl di Tailwind (min-width: 1280px)
                                            slidesPerView: 3, // Tampilkan 3 slide jika layar xl ke atas
                                        }
                                    }
                                });

                                // // Debugging
                                // console.log("Next Button:", document.querySelector(".swiper-button-next-custom"));
                                // console.log("Prev Button:", document.querySelector(".swiper-button-prev-custom"));
                            });
                        </script>

                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>

        </div>




    </div>





    </div>



</x-LayoutUser>
