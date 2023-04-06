<div class="mt-3">
  <table class="table table-striped table-compact table-bordered table-responsive" id="table-spp">
      <thead>
          <tr>
              <th class="text-center" width="5%">No</th>
              <th class="text-center">Tahun</th>
              <th class="text-center">Nominal</th>
              <th class="text-center" width="12%">Aksi</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($spp as $s)
          <tr>
              <td>{{ $i = !isset($i)?$i=1 : ++$i }}</td>
              <td>{{ $s->tahun }}</td>
              <td>{{ $s->nominal }}</td>
              <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#FormTambahSpp"
                      data-mode = "edit"
                      data-id_spp = "{{ $s->id_spp }}"
                      data-tahun = "{{ $s->tahun }}"
                      data-nominal = "{{ $s->nominal }}"
                  >
                      <i class="nav-icon fas fa-pencil-alt"></i>
                  </button>
                  |
                  <form action="{{ route('spp.destroy', $s->id_spp) }}" method="post" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger remove" data-toggle="modal" data-target="#ModalHapusSpp">
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
<div class="modal fade" id="ModalHapusSpp" tabindex="-1" role="dialog" aria-labelledby="ModalHapusSppLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalHapusSppLabel">Konfirmasi Hapus SPP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Apakah <b id="hapus-data"></b> Akan dihapus dari daftar data SPP?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="nav-icon fas fa-times-circle"></i> Tidak</button>
        <button type="button" id="btn-confirm" class="btn btn-danger"><i class="nav-icon fas fa-check-circle"></i> Iya</button>
      </form>
      </div>
    </div>
  </div>
</div>
