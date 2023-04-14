<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BerandaController extends Controller
{
    public function index()
    {
        $data['title'] = "Beranda Guru";
        $guru = Guru::where('id', session('user')->id)->first();
        $data['siswa'] = Siswa::where('kelas_id', $guru->kelas_id)->get()->count();
        return view('guru.beranda', $data);
    }

    public function daftarSiswa()
    {
        $data['title'] = "Daftar Siswa";
        $guru = Guru::where('id', session('user')->id)->first();
        $data['siswa'] = Siswa::where('kelas_id', $guru->kelas_id)->with('hasKelas')->get();
        return view('guru.siswa', $data);
    }

    public function inputView($id)
    {
        $data['title'] = "Input Nilai";
        $data['siswa'] = Siswa::where('id', $id)->with('hasKelas')->first();
        return view('guru.inputNilai', $data);
    }

    public function inputNilai(Request $request)
    {
        try {
            $request->validate([
                'nilai' => 'required',
                'jenis' => 'required',
                'keterangan' => 'required'
            ]);

            $nilai = $request->nilai;
            $jenis = $request->jenis;
            $keterangan = $request->keterangan;
            $siswa_id = $request->siswa_id;
            $guru_id = $request->guru_id;

            $add = new Nilai;
            $add->id = Str::random(9);
            $add->siswa_id = $siswa_id;
            $add->guru_id = $guru_id;
            $add->nilai = $nilai;
            $add->jenis = $jenis;
            $add->keterangan = $keterangan;
            $add->save();

            return redirect()->route('guru.siswaView')->with('success', 'Berhasil input nilai siswa');
        } catch (\Throwable $th) {
            return redirect()->route('guru.siswaView')->with('error', $th->getMessage());
        }
    }

    public function nilaiView()
    {
        $data['title'] = "Nilai Siswa";
        $data['nilai'] = Nilai::where('guru_id', session('user')->id)->with('hasGuru')->with('hasSiswa')->get();
        return view('guru.nilai', $data);
    }
}
