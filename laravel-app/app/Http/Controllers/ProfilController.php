<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profiles = [
            [
                'username' => 'glen',
                'nama'     => 'Glen Rejeki Sitorus',
                'prodi'    => 'Informatika',
                'angkatan' => '2023',
            ],
            [
                'username' => 'najwa',
                'nama'     => 'Najwa Aulia',
                'prodi'    => 'Sistem Informasi',
                'angkatan' => '2022',
            ],
        ];

        return view('profil.index', compact('profiles'));
    }

    public function show($username)
    {
        $profiles = [
            'glen' => [
                'username' => 'glen',
                'nama'     => 'Glen Rejeki Sitorus',
                'prodi'    => 'Informatika',
                'angkatan' => '2023',
                'email'    => 'glen@example.com',
            ],
            'najwa' => [
                'username' => 'najwa',
                'nama'     => 'Najwa Aulia',
                'prodi'    => 'Sistem Informasi',
                'angkatan' => '2022',
                'email'    => 'najwa@example.com',
            ],
        ];

        if (! array_key_exists($username, $profiles)) {
            abort(404);
        }

        $profil = $profiles[$username];

        return view('profil.show', compact('profil'));
    }
}
