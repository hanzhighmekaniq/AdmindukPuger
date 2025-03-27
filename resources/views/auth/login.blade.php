<x-guest-layout>
    <section class="grid xl:grid-cols-12 h-screen w-screen px-4 lg:px-0">
        <div
            class="hidden xl:flex col-span-4 bg-gradient-to-b from-[#BFE7FF] to-[#429DFF] flex-col justify-center items-center space-y-10">
            <div class="flex flex-col justify-center items-center ">
                <span
                    class="text-sm md:text-3xl top-0.5 md:top-1.5 relative  whitespace-nowrap text-black poppins-bold font-bold">Adminduk</span>
                <span duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95pan
                    class="text-md md:text-4xl bottom-0.5 md:bottom-1.5 text-[#06275A] relative  whitespace-nowrap poppins-bold font-bold">PUGER</span>
            </div>
            <div class="flex flex-col justify-center items-center">
                <p class="poppins-regular text-xl text-center">
                    Kelola informasi kependudukan <br>Puger dengan efisien</br>
                </p>
            </div>
            <div class="flex flex-col justify-center items-center pl-10">
                <img src="{{ asset('img/login-svg.png') }}" alt=""
                    class=" max-w-md 2xl:max-w-5xl flex justify-center">
            </div>
        </div>


        <div class="col-span-8 flex flex-col justify-center items-center ">
            <div class="w-full">
                <div class="flex justify-center pb-28">
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-2xl md:text-4xl poppins-bold">Selamat Datang</p>
                        <p class="poppins-regular text-sm text-center pt-2"> Masukkan informasi akun Anda yang valid <br> untuk
                            melanjutkan proses dan mendapatkan akses ke fitur aplikasi.</p>
                    </div>

                </div>

                <form action="{{ route('login') }}" method="POST" class="flex justify-center w-full">
                    @csrf
                    <div class="space-y-4 w-full max-w-2xl">
                        <!-- Email Field -->
                        <div class="relative flex flex-col w-full">
                            <label for="email" class="mb-2 text-sm font-medium text-gray-900">Email address</label>
                            <div class="relative flex justify-center items-center w-full">
                                <input type="email" id="email" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-12"
                                    placeholder="Masukan Email Anda" required />
                                <img src="{{ asset('img/user.png') }}" alt=""
                                    class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 object-contain">
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="relative flex flex-col w-full">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <div class="relative flex justify-center items-center w-full">
                                <input type="password" id="password" name="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-12"
                                    placeholder="•••••••••" required />
                                <img src="{{ asset('img/pass.png') }}" alt=""
                                    class="absolute left-2 top-1/2 transform -translate-y-1/2 w-6 h-6 object-contain">
                            </div>
                        </div>
                        <div class="flex justify-center pt-10">
                            <a class="underline" href="{{ route('password.request') }}">Lupa Password?</a>
                        </div>
                        <!-- Submit Button -->
                        <div class="flex justify-center pb-32">
                            <button type="submit"
                                class="flex w-full max-w-lg justify-center py-2 poppins-bold text-white rounded-xl bg-[#06275A]">Masuk</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </section>
</x-guest-layout>
