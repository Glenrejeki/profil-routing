<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Profil Routing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background:#f5f5f5; font-family: Arial, sans-serif; min-height:100vh; display:flex; justify-content:center; align-items:center; padding:20px; }
        .card { background:#fff; width:100%; max-width:420px; border-radius:10px; box-shadow:0 10px 25px rgba(0,0,0,.05); padding:24px 26px 28px; }
        .title { font-size:20px; font-weight:600; margin-bottom:4px; }
        .sub { font-size:13px; color:#666; margin-bottom:20px; }
        label { display:block; font-size:13px; margin-bottom:6px; }
        input, select { width:100%; padding:8px 10px; border:1px solid #ddd; border-radius:6px; margin-bottom:14px; font-size:13px; }
        button { width:100%; background:#f53003; color:#fff; border:none; padding:9px 0; border-radius:6px; cursor:pointer; font-weight:600; }
        button:hover { background:#d82800; }
        .small-link { margin-top:16px; font-size:13px; text-align:center; }
        .small-link a { color:#f53003; text-decoration:none; }
        .top-link { text-align:right; margin-bottom:10px; font-size:12px; }
        .top-link a { color:#444; text-decoration:none; }
        .error { color:#c00; font-size:12px; margin:-8px 0 10px; }
        .alert { background:#ecfdf5; color:#065f46; padding:10px 12px; border-radius:8px; font-size:13px; margin-bottom:12px; border:1px solid #a7f3d0;}
    </style>
</head>
<body>
<div class="card">
    <div class="top-link">
        <a href="{{ route('home') }}">← kembali</a>
    </div>

    <div class="title">Daftar</div>
    <div class="sub">Buat akun barumu.</div>

    @if ($errors->any())
        <div class="alert">
            <div><strong>Periksa lagi:</strong></div>
            <ul style="margin:6px 0 0 16px; padding:0;">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.post') }}" enctype="multipart/form-data">
        @csrf

        <label for="username">Username</label>
        <input id="username" type="text" name="username" required placeholder="misal: delian_2025" value="{{ old('username') }}">

        <label for="name">Nama mahasiswa (nama lengkap)</label>
        <input id="name" type="text" name="name" required placeholder="Nama lengkap" value="{{ old('name') }}">

        <label for="prodi">Program Studi</label>
        <select id="prodi" name="prodi" required>
            <option value="" disabled {{ old('prodi') ? '' : 'selected' }}>-- pilih prodi --</option>
            <option {{ old('prodi')=='Informatika' ? 'selected' : '' }}>Informatika</option>
            <option {{ old('prodi')=='Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
            <option {{ old('prodi')=='Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
            <option {{ old('prodi')=='Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
        </select>

        <label for="tahun_masuk">Tahun Masuk</label>
        <input id="tahun_masuk" type="number" name="tahun_masuk" required placeholder="misal: 2023" value="{{ old('tahun_masuk') }}">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" required placeholder="contoh: mahasiswa@itdel.ac.id" value="{{ old('email') }}">

        <label for="photo">Foto</label>
        <input id="photo" type="file" name="photo" accept="image/*" required>

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required placeholder="minimal 6 karakter">

        <label for="password_confirmation">Konfirmasi Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="ulangi password">

        <button type="submit">Daftar</button>
    </form>

    <div class="small-link">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
    </div>
</div>
</body>
</html>
