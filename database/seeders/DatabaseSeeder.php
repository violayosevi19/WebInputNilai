<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\DaftarPelajaran;
use App\Models\DaftarPelajaranSiswa;
use App\Models\Siswa;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Siswa::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Guru::create([
            'nip' => '1980109203200109',
            'nama_guru' => 'Desi Susanti, S.Pd',
            'no_hp' => '081266778899',
            'kelas_id' => '1',
            'email' => 'desisusanti@gmail.com',
            'user_id' => '2'
        ]);

        Guru::create([
            'nip' => '1980145689726389',
            'nama_guru' => 'Desi Ratnasari, S.Pd',
            'no_hp' => '081266778899',
            'kelas_id' => '2',
            'email' => 'desiratnasari@gmail.com',
            'user_id' => '1'
        ]);

        Kelas::create([
            'nama_kelas' => 'kelas 1',
        ]);

        Kelas::create([
            'nama_kelas' => 'kelas 2',
        ]);

        DaftarPelajaran::create([
            'kode_mapel' => 'E02',
            'mata_pelajaran' => 'Bahasa Indonesia',
        ]);

        DaftarPelajaran::create([
            'kode_mapel' => 'E03',
            'mata_pelajaran' => 'Matematika',
        ]);

        DaftarPelajaran::create([
            'kode_mapel' => 'E04',
            'mata_pelajaran' => 'IPA',
        ]);

        DaftarPelajaran::create([
            'kode_mapel' => 'E01',
            'mata_pelajaran' => 'IPS',
        ]);

        DaftarPelajaran::create([
            'kode_mapel' => 'E05',
            'mata_pelajaran' => 'Bahasa Inggris',
        ]);

        DaftarPelajaranSiswa::create([
            'daftar_pelajaran_id' => '1',
            'siswa_id' => '1',
            'nilai'=> 90
        ]);

        DaftarPelajaranSiswa::create([
            'daftar_pelajaran_id' => '2',
            'siswa_id' => '1',
            'nilai'=> 96
        ]);

        DaftarPelajaranSiswa::create([
            'daftar_pelajaran_id' => '1',
            'siswa_id' => '3',
            'nilai'=> 97
        ]);

    }
}
