<div class="mt-3">
  <table class="table table-striped table-compact table-bordered table-responsive" id="table-laporan">
      <thead>
          <tr>
              <th class="text-center" width="5%">No</th>
              <th class="text-center">Jenis</th>
              <th class="text-center">Deskripsi</th>
              <th class="text-center">Tanggal Kejadian</th>
              <th class="text-center">Pelapor</th>
              <th class="text-center" width="12%">Status</th>
              <th class="text-center">Status Selesai</th>
              <th class="text-center">Aksi</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($laporanbug as $l)
          <tr>
              <td>{{ $i = !isset($i)?$i=1 : ++$i }}</td>
              <td>{{ $l->jenis }}</td>
              <td>{{ $l->deskripsi }}</td>
              <td>{{ $l->tglKejadian }}</td>
              <td>{{ $l->pelapor }}</td>
              <td>
                <select class="choices form- select" id="select" name="status" required
                      data-id="{{ $l->id }}"
                      data-jenis="{{ $l->jenis }}"
                      data-deskripsi = "{{ $l->deskripsi }}"
                      data-tanggal_kejadian = "{{ $l->tglKejadian }}"
                      data-pelapor = "{{ $l->pelapor }}"
                      data-status = "{{ $l->status }}"
                  >

                    <option vallue="reported" {{ old('status', $l->status) == 'reported' ? 'selected' : '' }}>reported</option>
                    <option vallue="on_progress" {{ old('status', $l->status) == 'on progress' ? 'selected' : '' }}>on progress</option>
                    <option vallue="solved" {{ old('status', $l->status) == 'solved' ? 'selected' : '' }}>solved</option>
                  </select>
              </td>
              @if($l->status == "reported")
                <td><span class="badge bg-warning">Belum Selesai</span></td>
              @elseif($l->status == "on_progress")
                <td><span class="badge bg-warning">Sedang di Proses</span></td>
              @else
                <td><span class="badge bg-success">Selesai</span></td>
              @endif
              <td>

                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#FormLaporanBug"
                      data-mode = "edit"
                      data-id = "{{ $l->id }}"
                      data-jenis = "{{ $l->jenis }}"
                      data-deskripsi = "{{ $l->deskripsi }}"
                      data-tanggal_kejadian = "{{ $l->tglKejadian }}"
                      data-pelapor = "{{ $l->pelapor }}"
                      data-status = "{{ $l->status }}"
                  >
                      <i class="nav-icon fas fa-pencil-alt"></i>
                  </button>
                  |
                  <form action="{{ route('laporanbug.destroy', $l->id) }}" method="post" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger remove" data-toggle="modal" data-target="#ModalHapusLaporan"
                  data-route="{{ route('laporanbug.destroy', $l->id) }}">
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
<div class="modal fade" id="ModalHapusLaporan" tabindex="-1" role="dialog" aria-labelledby="ModalHapusLaporanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalHapusLaporanLabel">Konfirmasi Hapus Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Apakah <b id="hapus-data"></b> Akan dihapus dari daftar data Laporan?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="nav-icon fas fa-times-circle"></i> Tidak</button>
        <button type="button" id="btn-confirm" class="btn btn-danger"><i class="nav-icon fas fa-check-circle"></i> Iya</button>
      </form>
      </div>
    </div>
  </div>
</div>
