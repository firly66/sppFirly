<!-- Modal -->
<div class="modal fade" id="FormTambahKelas" tabindex="-1" role="dialog" aria-labelledby="FormTambahKelasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="FormTambahKelasLabel">Form Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="tingkat">
            @csrf
            <div id="method"></div>
            <div class="form-group row">
                <label for="nama_kelas" class="col-sm-5 col-form-label">Nama Kelas</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
                </div>
            </div>
            <div class="form-group row">
                <label for="kompetensi_keahlian" class="col-sm-5 col-form-label">Kompetensi Keahlian</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian">
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
