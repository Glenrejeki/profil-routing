<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Profil</title>
</head>
<body>
    <h1>Daftar Profil Mahasiswa</h1>

    <ul>
        @foreach ($profiles as $p)
            <li>
                {{ $p['nama'] }} ({{ $p['prodi'] }})
                -
                <a href="{{ route('profil.show', $p['username']) }}">
                    Lihat Profil
                </a>
            </li>
        @endforeach
    </ul>

    <p><a href="{{ url('/') }}">Kembali ke Home</a></p>
</body>
</html>
