@extends('layouts.app')
@section('contents')
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-7 grid-margin">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table Siswa</h4>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Jacob</td>
                        <td>Photoshop</td>
                        <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                        <td><label class="badge badge-danger">Pending</label></td>
                      </tr>
                      <tr>
                        <td>Messsy</td>
                        <td>Flash</td>
                        <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr>
                      <tr>
                        <td>John</td>
                        <td>Premier</td>
                        <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                        <td><label class="badge badge-info">Fixed</label></td>
                      </tr>
                      <tr>
                        <td>Peter</td>
                        <td>After effects</td>
                        <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                        <td><label class="badge badge-success">Completed</label></td>
                      </tr>
                      <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr>
                    </tbody>
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
                <form class="forms-sample">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label>Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" placeholder="Tempat / Tanggal Lahir">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kelas</label>
                  <div class="row">
                      <div class="col-md-4">
                        <select class="form-control">
                            <option disabled selected>--Kelas--</option>
                            <option value="ix">IX</option>
                            <option value="x">X</option>
                            <option value="xi">XI</option>
                          </select>
                      </div>
                      <div class="col-md-4">
                        <select class="form-control">
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
                        <select class="form-control">
                            <option disabled selected>--Jurusan--</option>
                            <option value="ipa">IPA</option>
                            <option value="ips">IPS</option>
                          </select>
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label>No Handphone</label>
                    <input type="text" class="form-control" placeholder="No Handphone">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Alamat</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Tulis Alamat Lengkap"></textarea>
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
@endsection
