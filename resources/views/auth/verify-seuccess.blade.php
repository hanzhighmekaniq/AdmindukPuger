<x-guest-layout>
    <section class="grid xl:grid-cols-12 h-screen w-screen px-4 lg:px-0">
        <div
            class="hidden xl:flex col-span-4 bg-gradient-to-b from-[#BFE7FF] to-[#429DFF] flex-col justify-center items-center space-y-10">
            <div class="flex flex-col justify-center items-center">
                <span
                    class="text-sm md:text-3xl top-0.5 md:top-1.5 relative  whitespace-nowrap text-black poppins-bold font-bold">Adminduk</span>
                <span
                    class="text-md md:text-4xl bottom-0.5 md:bottom-1.5 text-[#06275A] relative whitespace-nowrap poppins-bold font-bold">PUGER</span>
            </div>
            <div class="flex flex-col justify-center items-center">
                <p class="poppins-regular text-xl text-center">
                    Kelola informasi kependudukan <br>Puger dengan efisien
                </p>
            </div>
            <div class="flex flex-col justify-center items-center pl-10">
                <img src="{{ asset('img/login-svg.png') }}" alt=""
                    class="max-w-md 2xl:max-w-5xl flex justify-center">
            </div>
        </div>

        <div class="col-span-8 flex flex-col justify-center items-center ">
            <div class="w-full">
                <div class="flex justify-center pb-28">
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-2xl md:text-4xl poppins-bold">Verifikasi Email Anda Berhasil</p>
                        <p class="poppins-regular text-sm text-center pt-2">Verifikasi email anda berhasil. <br>
                            Silahkan login melalui aplikasi mobile.</p>
                    </div>
                </div>

                <div class="flex justify-center pt-10">
                    <a href="{{ route('login') }}" class="text-blue-600 underline">Kembali ke Halaman Login</a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
