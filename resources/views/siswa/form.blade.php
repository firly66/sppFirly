<!-- Modal -->
<div class="modal fade" id="FormTambahSiswa" tabindex="-1" role="dialog" aria-labelledby="FormTambahSiswaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="FormTambahSiswaLabel">Form Tambah Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="siswa">
            @csrf
            <div id="method"></div>
            <div class="form-group row">
                <label for="nisn" class="col-sm-4 col-form-label">NISN</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="nisn" name="nisn">
                </div>
            </div>
            <div class="form-group row">
                <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="nis" name="nis">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
            <div class="form-group row">
            <label for="id_kelas" class="col-sm-4 col-form-label">Kelas</label>
            <div class="col-sm-8">
              <select type="text" class="form-control" name="id_kelas" id="id_kelas">
              @foreach ($kelas as $k)
                <option value="" selected disable hidden>Pilih Kelas</option>
                <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
              @endforeach
              </select>
            </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                <textarea name="alamat" id="alamat" cols="40" rows="6"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telp" class="col-sm-4 col-form-label">No Telepon</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="no_telp" name="no_telp">
                </div>
            </div>
            <div class="form-group row">
                <label for="id_spp" class="col-sm-4 col-form-label">ID SPP</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="id_spp" name="id_spp">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="nav-icon fas fa-times-circle"></i> Batal</button>
          <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-check-circle"></i> Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
