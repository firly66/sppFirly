<!-- Modal -->
<div class="modal fade" id="ModalDataSiswa" tabindex="-1" role="dialog" aria-labelledby="ModalDataSiswaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalDataSiswaLabel">Data Semua Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-compact table-bordered" id="table-bayar">
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
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#">
                            <i class="fa-solid fa-circle-plus"></i>
                          </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </form>
      </div>
    </div>
  </div>