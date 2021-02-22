@extends('layouts.app')
@section('contents')
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-7 grid-margin">
          <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-1">Table Siswa</h4>
                    <button type="button" class="btn btn-success" id="createNewItem">Info</button>
                </div>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th><strong>No</strong></th>
                        <th><strong>Nama</strong></th>
                        <th><strong>Kelas</strong></th>
                        <th><strong>No Telephone</strong></th>
                        <th><strong>Alamat</strong></th>
                        <th class="text-center"><strong>Aksi</strong></th>
                      </tr>
                    </thead>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($siswas as $item)
                    <tbody>
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kelas }} {{  $item->lokal }} {{ $item->jurusan  }}</td>
                        <td class="text-danger">{{ $item->phone }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" class="swal-confirm" >
                                <button class="btn btn-icon btn-secondary">
                                    <i class="mdi mdi-emoticon-happy"></i></button></a>

                            <a href="javascript:void(0)">
                                <button class="btn btn-icon btn-info btn-edit" data-id="{{ $item->id }}">
                                    <i class="mdi mdi-tooltip-edit"></i></button></a>

                            <form action="" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-icon btn-danger">
                                    <i class="mdi mdi-delete-forever"></i>
                                </button>
                            </form>

                        </td>
                        </tr>
                    </tbody>

                    @endforeach
                  </table>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Input Data</h4>
                <hr>
                <form class="forms-sample" action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(session('errors'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong>Something it's wrong!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                  <div class="form-group">
                    <label>NISN</label>
                    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN">
                    <div class="invalid-feedback">
                         NISN Kamu Sudah Terdaftar
                    </div>
                </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="form-group">
                    <label>Tempat Tanggal Lahir</label>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" name="tempat" class="form-control" placeholder="Tempat" required>
                        </div>
                        <div class="col-md-7">
                            <div class="input-group">
                                <input type="text" name="tgl" class="form-control datepicker" placeholder="Tanggal lahir" required>
                                <div class="input-group-append">
                                  <span class="input-group-text">
                                    <i class="mdi mdi-calendar-today"></i>
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label >Kelas</label>
                  <div class="row">
                      <div class="col-md-4">
                        <select name="kelas" class="form-control" required>
                            <option disabled selected>--Kelas--</option>
                            <option value="ix">IX</option>
                            <option value="x">X</option>
                            <option value="xi">XI</option>
                          </select>
                      </div>
                      <div class="col-md-4">
                        <select name="lokal" class="form-control" required>
                            <option disabled selected>--Lokal--</option>
                            <option value="1a">1A</option>
                            <option value="2a">2A</option>
                            <option value="3a">3A</option>
                            <option value="1b">1B</option>
                            <option value="2b">2B</option>
                            <option value="3b">3B</option>
                          </select>
                    </div>
                    <div class="col-md-4">
                        <select name="jurusan" class="form-control" required>
                            <option disabled selected>--Jurusan--</option>
                            <option value="ipa">IPA</option>
                            <option value="ips">IPS</option>
                          </select>
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label>No Handphone</label>
                    <input type="numeric" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="No Handphone" required>
                    <div class="invalid-feedback">
                        Gunakan Angka Dengan Min 10 | Max 14
                   </div>
                  </div>
                  <div class="form-group">
                    <label >Alamat</label>
                    <textarea name="alamat" class="form-control" rows="4" placeholder="Tulis Alamat Lengkap"></textarea>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" role="dialog" id="modal-edit" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <form method="post" action="" id="form-edit" class="form-horizontal">
                    @csrf
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-update">Save Changes</button>
                    </div>
            </form>
            </div>
        </div>
    </div>


@endsection
