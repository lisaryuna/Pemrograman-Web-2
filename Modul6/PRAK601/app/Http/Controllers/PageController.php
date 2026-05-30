<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pengalaman;

class PageController extends Controller
{
    public function beranda()
    {
        $data = Mahasiswa::getProfile();
        return view('beranda', compact('data'));
    }

    public function profil()
    {
        $profil = Mahasiswa::getProfile();
        $pengalaman = Pengalaman::all();
        return view('profil', compact('profil', 'pengalaman'));
    }

    public function detailPengalaman($id)
    {
        $detail = Pengalaman::find($id);

        if (!$detail) {
            abort(404);
        }

        return view('detail-pengalaman', compact('detail'));
    }
}
