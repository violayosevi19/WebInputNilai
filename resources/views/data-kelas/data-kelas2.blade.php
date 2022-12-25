@extends('layout.main')
@section('container')
@parent
<div class="card mb-4 mt-5">
    <div class="card-header">
        <div><i class="fas fa-table me-1"></i>
        Daftar Siswa</div> 
        @if(auth()->user()->role != 'siswa')
        <a href="/siswa/create"><i class="fa-solid fa-circle-plus"></i></a>
        @endif
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Guru PA</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
             @foreach($siswas as $siswa)
             <tr>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama_siswa }}</td>
                <td>{{ $siswa->guru->nama_guru }}</td>
                <td>{{ $siswa->kelas->nama_kelas }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>$320,800</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection