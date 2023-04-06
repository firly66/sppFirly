<!-- Modal -->
<div class="modal fade" id="FormTambahPetugas" tabindex="-1" role="dialog" aria-labelledby="FormTambahPetugasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="FormTambahPetugasLabel">Form Tambah Pelapor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="pegawai">
            @csrf
            <div id="method"></div>
            <div class="form-group row">
                <label for="username" class="col-sm-4 col-form-label">Jenis</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="username" name="username">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label">Deskripsi</label>
                <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_bug" class="col-sm-4 col-form-label">tglKejadian</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="jenis_bug" name="jenis_bug">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_bug" class="col-sm-4 col-form-label">Pelapor</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="jenis_bug" name="jenis_bug">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_bug" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="jenis_bug" name="jenis_bug">
                </div>
            </div>
            <div class="form-group row">
            <label for="level" class="col-sm-4 col-form-label">Level</label>
            <div class="col-sm-8">
              <select type="text" class="form-control" name="level" id="level" placeholder="Level">
                <option value="" selected disable hidden>Pilih Level</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
              </select>
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
