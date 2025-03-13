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
                        <p class="text-4xl poppins-bold">Ganti Kata Sandi</p>
                        <p class="poppins-reguler text-sm text-center pt-2">Masukkan kata sandi baru Anda di bawah ini
                            <br> untuk melanjutkan penggantian kata sandi.
                        </p>
                    </div>

                </div>

                <!-- Form for Password Reset -->
                <form method="POST" action="{{ route('password.store') }}" class="flex justify-center w-full">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="space-y-4 w-full max-w-2xl">
                        <!-- Email Field -->
                        <div class="relative flex flex-col w-full">
                            <label for="email" class="mb-2 text-sm font-medium text-gray-900">Email Address</label>
                            <div class="relative flex justify-center items-center w-full">
                                <input type="email" id="email" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-12"
                                    placeholder="Masukkan Email Anda" required
                                    value="{{ old('email', $request->email) }}" />
                                <img src="{{ asset('img/user.png') }}" alt=""
                                    class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 object-contain">
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <div class="mt-4 relative">
                            <x-input-label for="password" :value="__('Password')" />
                            <div class="relative flex justify-center items-center w-full">
                                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password"
                                    name="password" required autocomplete="new-password" />

                                <!-- Tombol untuk toggle password -->
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 focus:outline-none z-[1]">
                                    <!-- Mata tertutup -->
                                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M3 12s3-6 9-6 9 6 9 6-3 6-9 6-9-6-9-6z" />
                                        <circle cx="12" cy="12" r="3" class="eye-pupil" />
                                    </svg>
                                    <!-- Mata terbuka, hanya akan muncul jika password dibuka -->
                                    <svg id="eyeIconOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M15 12c0-1.333-.333-2.6-.938-3.625m1.876 6.25c-1.346-.498-2.627-1.144-3.684-1.877M9 12c0-1.333.333-2.6.938-3.625M4.755 4.755c2.351-2.351 5.842-2.351 8.193 0l.61.61c.105.105.206.216.309.32 2.85 2.85 3.265 7.25.727 10.303-2.395 2.396-5.834 2.396-8.185 0l-.61-.61a6.64 6.64 0 0 0-.325-.314c-2.85-2.85-3.264-7.25-.727-10.303z" />
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mt-4 relative">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <div class="relative flex justify-center items-center w-full">
                                <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                                <!-- Tombol untuk toggle confirm password -->
                                <button type="button" id="toggleConfirmPassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 focus:outline-none z-[1]">
                                    <!-- Mata tertutup -->
                                    <svg id="eyeIconConfirm" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M3 12s3-6 9-6 9 6 9 6-3 6-9 6-9-6-9-6z" />
                                        <circle cx="12" cy="12" r="3" class="eye-pupil" />
                                    </svg>
                                    <!-- Mata terbuka, hanya akan muncul jika password dibuka -->
                                    <svg id="eyeIconOpenConfirm" xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M15 12c0-1.333-.333-2.6-.938-3.625m1.876 6.25c-1.346-.498-2.627-1.144-3.684-1.877M9 12c0-1.333.333-2.6.938-3.625M4.755 4.755c2.351-2.351 5.842-2.351 8.193 0l.61.61c.105.105.206.216.309.32 2.85 2.85 3.265 7.25.727 10.303-2.395 2.396-5.834 2.396-8.185 0l-.61-.61a6.64 6.64 0 0 0-.325-.314c-2.85-2.85-3.264-7.25-.727-10.303z" />
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <script>
                            // Function to toggle password visibility
                            function togglePassword(inputId, iconId) {
                                const passwordField = document.getElementById(inputId);
                                const icon = document.getElementById(iconId);
                                const iconOpen = document.getElementById(iconId + 'Open'); // Open icon

                                // Toggle password visibility
                                if (passwordField.type === "password") {
                                    passwordField.type = "text";
                                    icon.classList.add("hidden");
                                    iconOpen.classList.remove("hidden");
                                } else {
                                    passwordField.type = "password";
                                    icon.classList.remove("hidden");
                                    iconOpen.classList.add("hidden");
                                }
                            }
                        </script>







                        <!-- Submit Button -->
                        <div class="flex justify-center pb-32 pt-10">
                            <button type="submit"
                                class="flex w-full max-w-lg justify-center py-2 poppins-bold text-white rounded-xl bg-[#06275A]">
                                {{ __('Reset Kata Sandi') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
