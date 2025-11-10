<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profil {{ $profil['nama'] }}</title>
</head>
<body>
    <h1>Profil: {{ $profil['nama'] }}</h1>

    <p>Username: {{ $profil['username'] }}</p>
    <p>Program Studi: {{ $profil['prodi'] }}</p>
    <p>Angkatan: {{ $profil['angkatan'] }}</p>
    <p>Email: {{ $profil['email'] }}</p>

    <p><a href="{{ route('profil.index') }}">← Kembali ke daftar</a></p>
</body>
</html>
