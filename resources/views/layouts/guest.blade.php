<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<!-- Menampilkan status (pesan berhasil reset password) -->
@if (session('success'))
    <div id="statusMessage"
        class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 bg-green-500 text-white p-4 rounded-md shadow-md">
        {{ session('success') }} <!-- Pesan reset password berhasil -->
    </div>
@endif

<!-- Menampilkan error -->
@if ($errors->any())
    <div id="errorMessage"
        class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 bg-red-500 text-white p-4 rounded-md shadow-md">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li> <!-- Pesan error -->
            @endforeach
        </ul>
    </div>
@endif

<script>
    // Fungsi untuk menghilangkan elemen setelah 5 detik
    setTimeout(function() {
        const statusMessage = document.getElementById('statusMessage');
        const errorMessage = document.getElementById('errorMessage');

        if (statusMessage) {
            statusMessage.style.display = 'none'; // Sembunyikan status message
        }

        if (errorMessage) {
            errorMessage.style.display = 'none'; // Sembunyikan error message
        }
    }, 5000); // 5000 ms = 5 detik
</script>



<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full ">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
