<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
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
        //
        return view('data-siswa.data-siswa',[
            'siswas' => Siswa::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('data-siswa.create-data',[
            'gurus' => Guru::all(),
            'users' => User::all(),
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // input user
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_siswa;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->remember_token = Str::random(10);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());
        return redirect('/siswa')->with('pesan','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa,$id)
    {
        return view('data-siswa.edit-siswa',[
            'siswas' => Siswa::find($id),
            'gurus' => Guru::all(),
            'users' => User::all(),
            'kelas' => Kelas::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa,$id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        return redirect('/siswa')->with('pesan','Data berhasil ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa,$id)
    {
        Siswa::destroy($id);
        return redirect('/siswa');
    }
}
