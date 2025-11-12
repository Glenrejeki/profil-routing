<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Profil Routing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background:#f5f5f5; font-family: Arial, sans-serif; min-height:100vh; display:flex; justify-content:center; align-items:center; padding:20px; }
        .card { background:#fff; width:100%; max-width:380px; border-radius:10px; box-shadow:0 10px 25px rgba(0,0,0,.05); padding:24px 26px 28px; }
        .title { font-size:20px; font-weight:600; margin-bottom:4px; }
        .sub { font-size:13px; color:#666; margin-bottom:20px; }
        label { display:block; font-size:13px; margin-bottom:6px; }
        input { width:100%; padding:8px 10px; border:1px solid #ddd; border-radius:6px; margin-bottom:14px; font-size:13px; }
        button { width:100%; background:#f53003; color:#fff; border:none; padding:9px 0; border-radius:6px; cursor:pointer; font-weight:600; }
        button:hover { background:#d82800; }
        .small-link { margin-top:16px; font-size:13px; text-align:center; }
        .small-link a { color:#f53003; text-decoration:none; }
        .top-link { text-align:right; margin-bottom:10px; font-size:12px; }
        .top-link a { color:#444; text-decoration:none; }
        .alert { background:#fff7ed; color:#7c2d12; padding:10px 12px; border-radius:8px; font-size:13px; margin-bottom:12px; border:1px solid #fed7aa;}
    </style>
</head>
<body>
<div class="card">
    <div class="top-link">
        <a href="{{ route('home') }}">← kembali</a>
    </div>

    <div class="title">Masuk</div>
    <div class="sub">Silakan login untuk melihat profil.</div>

    @if ($errors->any())
        <div class="alert">
            @foreach ($errors->all() as $e)
                <div>{{ $e }}</div>
            @endforeach
        </div>
    @endif

    @if (session('warning'))
        <div class="alert">{{ session('warning') }}</div>
    @endif

    @if (session('success'))
        <div class="alert" style="background:#ecfdf5;color:#065f46;border-color:#a7f3d0">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required placeholder="contoh: mahasiswa@itdel.ac.id" value="{{ old('email') }}">

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required placeholder="••••••••">

        <button type="submit">Login</button>
    </form>

    <div class="small-link">
        Belum punya akun?
        <a href="{{ route('register') }}">Daftar sekarang</a>
    </div>
</div>
</body>
</html>
