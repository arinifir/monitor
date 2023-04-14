<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data['title'] = "Beranda Admin";
        $data['guru'] = Guru::get()->count();
        $data['siswa'] = Siswa::get()->count();
        return view('admin.beranda', $data);
    }
}
