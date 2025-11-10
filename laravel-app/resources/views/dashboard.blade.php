<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Profil Routing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; background:#f4f4f4; margin:0; min-height:100vh; }
        .topbar { background:#f53003; color:#fff; padding:14px 20px; display:flex; justify-content:space-between; align-items:center; }
        .brand { font-weight:600; }
        .topbar a { color:#fff; text-decoration:none; font-size:13px; }
        .container { max-width:940px; margin:26px auto; background:#fff; border-radius:10px; padding:22px 24px 28px; box-shadow:0 10px 25px rgba(0,0,0,.03); }
        .badge { display:inline-block; background:#fff1ed; color:#f53003; padding:4px 11px; border-radius:999px; font-size:12px; margin-bottom:16px; }
    </style>
</head>
<body>
    <div class="topbar">
        <div class="brand">Profil Routing</div>
        <div>
            <a href="{{ url('/') }}">Home</a>
        </div>
    </div>

    <div class="container">
        <span class="badge">Dashboard</span>
        <h1 style="margin:0 0 6px;">Selamat datang, {{ $nama }} 👋</h1>
        <p style="margin:0 0 16px;">sebagai mahasiswa IT Del</p>
        <p style="color:#666; font-size:13px;">Ini hanya dashboard contoh karena kita belum hubungkan ke database / sistem auth asli.</p>
    </div>
</body>
</html>
