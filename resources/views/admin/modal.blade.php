<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="id" id="id_siswa"  value="{{ $siswa->id }}">
            <label>NISN</label>
            <input type="text" name="nisn" value="{{ $siswa->nisn }}" class="form-control" disabled>
        </div>
        <div class="col-md-6">
            <label>Nama</label>
            <input type="text" name="nama"  value="{{ $siswa->nama }}"class="form-control">
        </div>
    </div>
</div>
<div class="form-group">
  <label>Tempat Tanggal Lahir</label>
  <div class="row">
      <div class="col-md-5">
          <input type="text" name="tempat"  value="{{ $siswa->tempat }}"class="form-control" >
      </div>
      <div class="col-md-7">
          <div class="input-group">
              <input type="text" name="tgl"  value="{{ $siswa->tgl }}"class="form-control datepicker">
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
      <select name="kelas" value="" class="form-control">
          <option value="{{ $siswa->kelas }}" selected>{{ $siswa->kelas }}</option>
          <option value="ix">IX</option>
          <option value="x">X</option>
          <option value="xi">XI</option>
        </select>
    </div>
    <div class="col-md-4">
      <select name="lokal" class="form-control" >
          <option value="{{ $siswa->lokal }}" selected>{{ $siswa->lokal }}</option>
          <option value="1a">1A</option>
          <option value="2a">2A</option>
          <option value="3a">3A</option>
          <option value="1b">1B</option>
          <option value="2b">2B</option>
          <option value="3b">3B</option>
        </select>
  </div>
  <div class="col-md-4">
      <select name="jurusan"class="form-control" ">
          <option value="{{ $siswa->jurusan }}" selected>{{ $siswa->jurusan }}</option>
          <option value="ipa">IPA</option>
          <option value="ips">IPS</option>
        </select>
  </div>
</div>
</div>
<div class="form-group">
  <label>No Handphone</label>
  <input type="numeric" name="phone"  value="{{ $siswa->phone }}" class="form-control">

</div>
<div class="form-group">
  <label >Alamat</label>
  <textarea name="alamat" id="alamat" class="form-control" rows="4">{{ $siswa->alamat }}</textarea>
</div>
