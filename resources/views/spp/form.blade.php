<!-- Modal -->
<div class="modal fade" id="FormTambahSpp" tabindex="-1" role="dialog" aria-labelledby="FormTambahSppLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="FormTambahSppLabel">Form Tambah SPP</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="spp">
            @csrf
            <div id="method"></div>
            <div class="form-group row">
                <label for="tahun" class="col-sm-4 col-form-label">Tahun</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="tahun" name="tahun">
                </div>
            </div>
            <div class="form-group row">
                <label for="nominal" class="col-sm-4 col-form-label">Nominal</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="nominal" name="nominal">
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
