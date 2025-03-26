<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/font.css'])
    {{-- LINK GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- LINK FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Castoro:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- SWIPER --}}
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <title>AdmindukPuger</title>
</head>






<body class="bg-white">
    @include('partials.navbar')
    @include('partials.sidebar')
    @include('modal.Success&Error')
    <div class="p-4 lg:ml-80">
        <div class="p-4 rounded-lg ">
            {{ $slot }}
            <footer class="bg-white shadow-sm border-gray-200 border mt-4 p-4">
                <div
                    class="max-w-7xl xl:max-w-full mx-auto flex flex-col sm:flex-row justify-between items-center text-gray-600 text-sm">
                    <span>&copy; {{ date('Y') }} <a href="#" class="text-blue-500 hover:underline">Adminduk
                            Puger</a>.
                        All rights reserved.</span>
                    <div class="flex space-x-4 mt-2 sm:mt-0">
                        <a href="#" class="hover:text-blue-500">Privacy Policy</a>
                        <a href="#" class="hover:text-blue-500">Terms of Service</a>
                        <a href="#" class="hover:text-blue-500">Support</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>


</body>





</html>
