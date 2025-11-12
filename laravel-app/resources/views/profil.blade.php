<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Mahasiswa - Profil Routing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; background:#f4f4f4; margin:0; min-height:100vh; }
        .topbar { background:#f53003; color:#fff; padding:14px 20px; display:flex; justify-content:space-between; align-items:center; }
        .brand { font-weight:600; }
        .topbar a, .topbar form button { color:#fff; text-decoration:none; font-size:13px; background:none; border:none; cursor:pointer; }
        .container { max-width:940px; margin:26px auto; background:#fff; border-radius:10px; padding:22px 24px 28px; box-shadow:0 10px 25px rgba(0,0,0,.03); }
        .badge { display:inline-block; background:#fff1ed; color:#f53003; padding:4px 11px; border-radius:999px; font-size:12px; margin-bottom:16px; }
        .profile { display:flex; gap:18px; align-items:center; }
        .profile img { width:92px; height:92px; border-radius:999px; object-fit:cover; border:3px solid #ffe4de; }
        .kv { margin-top:14px; }
        .kv div { margin-bottom:8px; font-size:14px; }
        .kv span { display:inline-block; width:130px; color:#666; }
        .alert { background:#ecfdf5; color:#065f46; padding:10px 12px; border-radius:8px; font-size:13px; margin-bottom:12px; border:1px solid #a7f3d0;}
    </style>
</head>
<body>
<div class="topbar">
    <div class="brand">Profil Routing</div>
    <div style="display:flex; gap:12px; align-items:center;">
        <a href="{{ route('home') }}">Home</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <span class="badge">Profil</span>
    <div class="profile">
        <img src="{{ asset('storage/' . $user['photo']) }}" alt="Foto {{ $user['name'] }}">
        <div>
            <h1 style="margin:0 0 6px;">{{ $user['name'] }}</h1>
            <p style="margin:0; color:#666; font-size:13px;">Mahasiswa {{ $user['prodi'] }} • Angkatan {{ $user['tahun_masuk'] }}</p>
        </div>
    </div>

    <div class="kv">
        <div><span>Username</span>: {{ $user['username'] }}</div>
        <div><span>Email</span>: {{ $user['email'] }}</div>
        <div><span>Program Studi</span>: {{ $user['prodi'] }}</div>
        <div><span>Tahun Masuk</span>: {{ $user['tahun_masuk'] }}</div>
    </div>
</div>
</body>
</html>
