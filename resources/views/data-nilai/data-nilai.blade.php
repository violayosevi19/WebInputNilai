@extends('layout.main')
@section('container')
<div class="container">
  <div class="main-body">
    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
      </ol>
    </nav>
    <!-- /Breadcrumb -->
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>{{$siswas->nama_siswa}}</h4>
                      <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                        <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                        <button class="btn btn-primary">Follow</button>
                        <button class="btn btn-outline-primary">Message</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nama Lengkap</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{$siswas->nama_siswa}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{$siswas->email}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Kelas</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{$siswas->kelas->nama_kelas}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Jenis Kelamin</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{$siswas->jenis_kelamin}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                        @if(auth()->user()->role != 'siswa')
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                        Input Nilai</button>
                        @endif
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mata Pelajaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form  method="POST" action="/siswa/{{$siswas->id}}/addnilai">
                                  @csrf
                                  <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Kode Mapel</label>
                                    <input type="text" class="form-control" id="recipient-name" name="kode_mapel">
                                  </div>
                                  <div class="mb-3">
                                    <div class="input-group">
                                      <label class="label">Mata Pelajaran</label>
                                    </div>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <select class="form-select" aria-label="Default select example" name="mata_pelajaran">
                                        <option disabled="disabled" selected="selected">Pilih Mata Pelajaran</option>
                                        @foreach($mapels as $mapel)
                                        <option value="{{ $mapel->id }}">{{ $mapel->mata_pelajaran }}</option>
                                        @endforeach
                                      </select>
                                      <div class="select-dropdown"></div>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nilai</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nilai">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="main-body">
            
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
              <p class="fst-italic fs-3">Data Nilai Siswa</p>
            </nav>
            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Kode Mapel</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($siswas->daftar_pelajaran as $mapel)
                          <tr>
                            <td>{{$mapel->kode_mapel}}</td>
                            <td>{{$mapel->mata_pelajaran}}</td>
                            <td>{{$mapel->pivot->nilai}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="row">
                       @if(auth()->user()->role != 'siswa')
                       <div class="col-sm-12">
                        <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endsection