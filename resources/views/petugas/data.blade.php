<div class="mt-3">
  <table class="table table-striped table-compact table-bordered table-responsive" id="table-petugas">
      <thead>
          <tr>
              <th class="text-center" width="5%">No</th>
              <th class="text-center">Jenis Bug</th>
              <th class="text-center">Deskripsi</th>
              <th class="text-center">tglKejadian</th>
              <th class="text-center">Pelapor</th>
              <th class="text-center">Status</th>
              <th class="text-center" width="12%">Aksi</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($pegawai as $p)
          <tr>
              <td>{{ $i = !isset($i)?$i=1 : ++$i }}</td>
              <td>{{ $p->nama_petugas }}</td>
              <td>{{ $p->username }}</td>
              <td>{{ $p->level }}</td>
              <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#FormTambahPetugas"
                      data-mode = "edit"
                      data-id_petugas = "{{ $p->id_petugas }}"
                      data-username = "{{ $p->username }}"
                      data-password = "{{ $p->password }}"
                      data-nama_petugas = "{{ $p->nama_petugas }}"
                      data-level = "{{ $p->level }}"
                  >
                      <i class="nav-icon fas fa-pencil-alt"></i>
                  </button>
                  |
                  <form action="{{ route('pegawai.destroy', $p->id_petugas) }}" method="post" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger remove" data-toggle="modal" data-target="#ModalHapusPetugas">
                  <i class="fa-solid fa-circle-minus"></i>
                  </button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalHapusPetugas" tabindex="-1" role="dialog" aria-labelledby="ModalHapusPetugasLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalHapusPetugasLabel">Konfirmasi Hapus Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Apakah <b id="hapus-data"></b> Akan dihapus dari daftar data petugas?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="nav-icon fas fa-times-circle"></i> Tidak</button>
        <button type="button" id="btn-confirm" class="btn btn-danger"><i class="nav-icon fas fa-check-circle"></i> Iya</button>
      </form>
      </div>
    </div>
  </div>
</div>
