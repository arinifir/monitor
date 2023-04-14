<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Data Guru";
        $data['guru'] = Guru::with('hasKelas')->get();
        // dd($data);
        return view('admin.guru', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Guru";
        $data['kelas'] = Kelas::get();
        return view('admin.tambahGuru', $data);
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
                'nig' => 'required',
                'nama' => 'required',
                'mapel' => 'required',
                'kelas_id' => 'required'
            ]);

            $nig = $request->nig;
            $nama = $request->nama;
            $mapel = $request->mapel;
            $kelas_id = $request->kelas_id;
            $username = $nig;
            $password = $nig;

            $unique= Guru::where('nig', $nig)->get()->count();
            if ($unique > 0) {
                return redirect()->route('admin.guruView')->with('error', 'NIG sudah terdaftar!');
            }

            $guru = new Guru;
            $guru->id = Str::random(10);
            $guru->nig = $nig;
            $guru->nama = $nama;
            $guru->mapel = $mapel;
            $guru->kelas_id = $kelas_id;
            $guru->username = $username;
            $guru->password = $password;
            $guru->save();

            return redirect()->route('admin.guruView')->with('success', 'Berhasil tambah data guru');
        } catch (\Throwable $th) {
            return redirect()->route('admin.guruView')->with('error', $th->getMessage());
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
        $data['title'] = "Detail Guru";
        $data['kelas'] = Kelas::get();
        $data['guru'] = Guru::where('id', $id)->with('hasKelas')->first();
        return view('admin.ubahGuru', $data);
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
                'nig' => 'required',
                'nama' => 'required',
                'mapel' => 'required',
                'kelas_id' => 'required'
            ]);

            $id = $request->id;
            $nig = $request->nig;
            $nama = $request->nama;
            $mapel = $request->mapel;
            $kelas_id = $request->kelas_id;
            $guru = Guru::where('id', $id)->first();
            
            if ($request->nig == $guru->nig){
                $nig = $guru->nig;
            }else{
                $unique= Guru::where('nig', $request->nig)->get()->count();
                if ($unique > 0) {
                    return redirect()->route('admin.guruView')->with('error', 'NIG sudah terdaftar!');
                }
            }
            $username = $nig;
            $password = $nig;

            $guru->nig = $nig;
            $guru->nama = $nama;
            $guru->mapel = $mapel;
            $guru->kelas_id = $kelas_id;
            $guru->username = $username;
            $guru->password = $password;
            $guru->save();

            return redirect()->route('admin.guruView')->with('success', 'Berhasil tambah ubah guru');
        } catch (\Throwable $th) {
            return redirect()->route('admin.guruView')->with('error', $th->getMessage());
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
        $guru = Guru::find($id);
        $guru->delete();

        return redirect()->route('admin.guruView')->with('success', 'Berhasil hapus data guru');
    }
}
