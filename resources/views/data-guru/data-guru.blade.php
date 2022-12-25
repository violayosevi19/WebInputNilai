@extends('layout.main')
@section('container')
@parent
<div class="card mb-4 mt-5">
    <div class="card-header">
        <div><i class="fas fa-table me-1"></i>
        Daftar Guru</div> 
        @if(auth()->user()->role == 'admin')
        <a href="/guru/create"><i class="fa-solid fa-circle-plus"></i></a>
        @endif
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>No Hp</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
               @foreach($gurus as $guru)
               <tr>
                <td>{{ $guru->nip }}</td>
                <td>{{ $guru->nama_guru }}</td>
                <td>{{ $guru->no_hp }}</td>
                <td>{{ $guru->kelas->nama_kelas }}</td>
                <td>
                    <a href="/guru/{{$guru->id}}/edit" class="btn btn-warning">Edit</a>
                    <form  class="d-inline" action="/guru/{{$guru->id}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')">Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection