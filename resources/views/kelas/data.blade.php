<div class="mt-3">
  <table class="table table-striped table-compact table-bordered table-responsive" id="table-kelas">
      <thead>
          <tr>
              <th class="text-center" width="5%">No</th>
              <th class="text-center">Nama Kelas</th>
              <th class="text-center">Kompetensi Keahlian</th>
              <th class="text-center" width="12%">Aksi</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($tingkat as $t)
          <tr>
              <td>{{ $i = !isset($i)?$i=1 : ++$i }}</td>
              <td>{{ $t->nama_kelas }}</td>
              <td>{{ $t->kompetensi_keahlian }}</td>
              <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#FormTambahKelas"
                      data-mode = "edit"
                      data-id_kelas = "{{ $t->id_kelas }}"
                      data-nama_kelas = "{{ $t->nama_kelas }}"
                      data-kompetensi_keahlian = "{{ $t->kompetensi_keahlian}}"
                  >
                      <i class="nav-icon fas fa-pencil-alt"></i>
                  </button>
                  |
                  <form action="{{ route('tingkat.destroy', $t->id_kelas) }}" method="post" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger remove" data-toggle="modal" data-target="#ModalHapusKelas">
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
<div class="modal fade" id="ModalHapusKelas" tabindex="-1" role="dialog" aria-labelledby="ModalHapusKelasLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalHapusKelasLabel">Konfirmasi Hapus Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Apakah <b id="hapus-data"></b> Akan dihapus dari daftar data Kelas?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="nav-icon fas fa-times-circle"></i> Tidak</button>
        <button type="button" id="btn-confirm" class="btn btn-danger"><i class="nav-icon fas fa-check-circle"></i> Iya</button>
      </form>
      </div>
    </div>
  </div>
</div>
