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
    </style>
</head>
<body>
    <div class="card">
        <div class="top-link">
            <a href="{{ url('/') }}">← kembali</a>
        </div>

        <div class="title">Masuk</div>
        <div class="sub">Silakan login untuk masuk ke dashboard.</div>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required placeholder="contoh: mahasiswa@itdel.ac.id">

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
