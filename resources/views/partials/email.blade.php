<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>
<body>
    <h2>Halo, {{ $name }}!</h2>
    <p>Terima kasih telah mendaftar. Klik tombol di bawah untuk memverifikasi email Anda:</p>
    <p>
        <a href="{{ $verificationUrl }}"
           style="display:inline-block; padding:10px 20px; background:#28a745; color:#fff; text-decoration:none; border-radius:5px;">
            Verifikasi Email
        </a>
    </p>
    <p>Jika Anda tidak merasa mendaftar, abaikan email ini.</p>
    <p>Salam,<br><strong>Web Admin Duk</strong></p>
</body>
</html>
