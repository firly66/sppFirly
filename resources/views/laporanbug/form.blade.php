<!-- Modal -->
<div class="modal fade" id="FormLaporanBug" tabindex="-1" role="dialog" aria-labelledby="FormLaporanBugLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="FormLaporanBugLabel">Form Laporan Bug</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="laporanbug" id="FormLaporan">
            @csrf
            <div id="method"></div>
            <div class="form-group row">
            <label for="jenis" class="col-sm-4 col-form-label">Jenis</label>
            <div class="col-sm-8">
              <select type="text" class="form-control" name="jenis" id="jenis" placeholder="jenis">
                <option value="" selected disable hidden>Pilih Jenis Error</option>
                <option value="functional error">Functional Error</option>
                <option value="performance defects">Performance Defects</option>
                <option value="usability defects">Usability Defects</option>
                <option value="compability error">Compability Error</option>
                <option value="security error">Security Error</option>
                <option value="syntax error">Syntax Error</option>
                <option value="logic error">Logic Error</option>
              </select>
            </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="tglKejadian" class="col-sm-4 col-form-label">Tanggal Kejadian</label>
                <div class="col-sm-8">
                <input type="date" class="form-control" id="tglKejadian" name="tglKejadian">
                </div>
            </div>
            <div class="form-group row">
                <label for="pelapor" class="col-sm-4 col-form-label">Pelapor</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="pelapor" name="pelapor" placeholder="">
                </div>
            </div>
            <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">Status</label>
            <div class="col-sm-8">
              <select type="text" class="form-control" name="status" id="status" placeholder="status">
                <option value="status" selected disable hidden>Pilih Status</option>
                <option value="reported">Reported</option>
                <option value="on progres">On Progres</option>
                <option value="solved">Solved</option>
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
<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Laporan Bug</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('laporanbug/import') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis">File Excel</label>
                                    <input type="file" name="import" id="import">
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
                </div>
                </div>
            </div>
        </div>
        </form>
