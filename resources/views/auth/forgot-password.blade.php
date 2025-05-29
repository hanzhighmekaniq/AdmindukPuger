<x-guest-layout>
    <section class="grid xl:grid-cols-12 h-screen w-screen px-4 lg:px-0">
        <!-- Left Section with Image and Text -->
        <div
            class="hidden xl:flex col-span-4 bg-gradient-to-b from-[#BFE7FF] to-[#429DFF] flex-col justify-center items-center space-y-10">
            <div class="flex flex-col justify-center items-center">
                <span
                    class="text-sm md:text-3xl top-0.5 md:top-1.5 relative whitespace-nowrap text-black poppins-bold font-bold">Adminduk</span>
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

        <!-- Right Section with Form -->
        <div class="col-span-8 flex flex-col justify-center items-center">
            <div class="w-full">
                <div class="flex justify-center pb-20">
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-4xl poppins-bold">Lupa Kata Sandi?</p>
                        <p class="poppins-reguler text-sm text-center pt-2">Masukkan alamat email Anda <br>untuk
                            menerima tautan reset kata
                            sandi.</p>
                    </div>
                </div>


                <!-- Form for Password Reset -->
                <form method="POST" action="{{ route('password.email') }}" class="flex justify-center w-full">
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
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        <!-- Form Description -->
                        <div class="mb-4 text-sm text-center text-gray-600">
                            {{ __('"Lupa kata sandi Anda? Tidak masalah. Beri tahu kami alamat email Anda, dan kami akan mengirimkan tautan reset kata sandi yang memungkinkan Anda untuk membuat kata sandi baru."') }}
                        </div>
                        <div class="flex items-center justify-center pt-10">
                            <a class="underline text-sm  text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#06275A]"
                                href="{{ route('login') }}">
                                {{ __('Masuk') }}
                            </a>
                        </div>
                        <!-- Submit Button -->
                        <div class="flex justify-center pb-32">
                            <button type="submit"
                                class="flex w-full max-w-lg justify-center py-2 poppins-bold text-white rounded-xl bg-[#06275A]">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>

                        <!-- Back Link -->

                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
