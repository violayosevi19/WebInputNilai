<?php

namespace App\Http\Controllers;

use App\Models\DaftarPelajaranSiswa;
use App\Models\Siswa;
use App\Models\DaftarPelajaran;
use Illuminate\Http\Request;

class DaftarPelajaranSiswaController extends Controller
{

    public function profile($id)
    {
        $siswa = Siswa::find($id);
        $mapel = DaftarPelajaran::all();
        return view('data-nilai.data-nilai',[
            'siswas' => $siswa,
            'mapels' => $mapel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addNilai(Request $request,$idsiswa)
    {
        // dd($request->all());
        $siswa = Siswa::find($idsiswa);
        if($siswa->daftar_pelajaran()->where('daftar_pelajaran_id',$request->mata_pelajaran)->exists()){
            return redirect('/siswa'.'/'.$idsiswa.'/profile');
        }
        $siswa->daftar_pelajaran()->attach($request->mata_pelajaran,['nilai' => $request->nilai]);

        return redirect('/siswa'.'/'.$idsiswa.'/profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarPelajaranSiswa  $daftarPelajaranSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarPelajaranSiswa $daftarPelajaranSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarPelajaranSiswa  $daftarPelajaranSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarPelajaranSiswa $daftarPelajaranSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarPelajaranSiswa  $daftarPelajaranSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarPelajaranSiswa $daftarPelajaranSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarPelajaranSiswa  $daftarPelajaranSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarPelajaranSiswa $daftarPelajaranSiswa)
    {
        //
    }
}
