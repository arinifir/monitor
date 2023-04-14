<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Data Siswa";
        $data['siswa'] = Siswa::with('hasKelas')->get();
        return view('admin.siswa', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Siswa";
        $data['kelas'] = Kelas::get();
        return view('admin.tambahSiswa', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nis' => 'required',
                'nama' => 'required',
                'kelas_id' => 'required'
            ]);

            $nis = $request->nis;
            $nama = $request->nama;
            $kelas_id = $request->kelas_id;
            $username = $nis;
            $password = $nis;

            $unique = Siswa::where('nis', $nis)->get()->count();
            if ($unique > 0) {
                return redirect()->route('admin.siswaView')->with('error', 'NIS sudah terdaftar!');
            }

            $siswa = new Siswa;
            $siswa->id = Str::random(8);
            $siswa->nis = $nis;
            $siswa->nama = $nama;
            $siswa->kelas_id = $kelas_id;
            $siswa->username = $username;
            $siswa->password = $password;
            $siswa->save();

            return redirect()->route('admin.siswaView')->with('success', 'Berhasil tambah data siswa');
        } catch (\Throwable $th) {
            return redirect()->route('admin.siswaView')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Detail Siswa";
        $data['kelas'] = Kelas::get();
        $data['siswa'] = Siswa::where('id', $id)->with('hasKelas')->first();
        return view('admin.ubahSiswa', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'nis' => 'required',
                'nama' => 'required',
                'kelas_id' => 'required'
            ]);

            $id = $request->id;
            $nis = $request->nis;
            $nama = $request->nama;
            $kelas_id = $request->kelas_id;
            $siswa = Siswa::where('id', $id)->first();

            if ($request->nis == $siswa->nis) {
                $nis = $siswa->nis;
            } else {
                $unique = Siswa::where('nis', $request->nis)->get()->count();
                if ($unique > 0) {
                    return redirect()->route('admin.siswaView')->with('error', 'NIG sudah terdaftar!');
                }
            }
            $username = $nis;
            $password = $nis;

            $siswa->nis = $nis;
            $siswa->nama = $nama;
            $siswa->kelas_id = $kelas_id;
            $siswa->username = $username;
            $siswa->password = $password;
            $siswa->save();

            return redirect()->route('admin.siswaView')->with('success', 'Berhasil tambah ubah siswa');
        } catch (\Throwable $th) {
            return redirect()->route('admin.siswaView')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect()->route('admin.siswaView')->with('success', 'Berhasil hapus data siswa');
    }
}
