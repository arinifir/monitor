<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data['title'] = "Beranda Siswa";
        $data['nilai'] = Nilai::where('siswa_id', session('user')->id)->get()->count();
        return view('siswa.beranda', $data);
    }

    public function nilaiView()
    {
        $data['title'] = "Nilai";
        $data['nilai'] = Nilai::where('siswa_id', session('user')->id)->with('hasGuru')->with('hasSiswa')->get();
        return view('siswa.nilai', $data);
    }
}
