<div class="mt-3">
  <table class="table table-striped table-compact table-bordered table-responsive" id="table-siswa">
      <thead>
          <tr>
              <th class="text-center" width="5%">No</th>
              <th class="text-center">NISN</th>
              <th class="text-center">NIS</th>
              <th class="text-center">Nama Lengkap</th>
              <th class="text-center">Kelas</th>
              <th class="text-center">Alamat</th>
              <th class="text-center">No Telepon</th>
              <th class="text-center">ID SPP</th>
              <th class="text-center" width="12%">Aksi</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($siswa as $s)
          <tr>
              <td>{{ $i = !isset($i)?$i=1 : ++$i }}</td>
              <td>{{ $s->nisn }}</td>
              <td>{{ $s->nis }}</td>
              <td>{{ $s->nama }}</td>
              <td>{{ $s->nama_kelas }}</td>
              <td>{{ $s->alamat }}</td>
              <td>{{ $s->no_telp }}</td>
              <td>{{ $s->id_spp}}</td>
              <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#FormTambahSiswa"
                      data-mode = "edit"
                      data-nisn = "{{ $s->nisn }}"
                      data-nis = "{{ $s->nis }}"
                      data-nama = "{{ $s->nama }}"
                      data-id_kelas = "{{ $s->id_kelas }}"
                      data-alamat = "{{ $s->alamat }}"
                      data-no_telp = "{{ $s->no_telp }}"
                      data-id_spp = "{{ $s->id_spp }}"
                  >
                      <i class="nav-icon fas fa-pencil-alt"></i>
                  </button>
                  |
                  <form action="{{ route('siswa.destroy', $s->nisn) }}" method="post" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger remove" data-toggle="modal" data-target="#ModalHapusSiswa">
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
<div class="modal fade" id="ModalHapusSiswa" tabindex="-1" role="dialog" aria-labelledby="ModalHapusSiswaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalHapusSiswaLabel">Konfirmasi Hapus Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Apakah <b id="hapus-data"></b> Akan dihapus dari daftar data Siswa?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="nav-icon fas fa-times-circle"></i> Tidak</button>
        <button type="button" id="btn-confirm" class="btn btn-danger"><i class="nav-icon fas fa-check-circle"></i> Iya</button>
      </form>
      </div>
    </div>
  </div>
</div>
