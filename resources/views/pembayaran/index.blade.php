@extends('templates.layout')

@push('style')

@endpush

@section('content')
<div class="card">
<div class="card-header">
    <h3 class="card-title">Halaman Entri Transaksi</h3>
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
        </button>
    </div>
    </div>
    <div class="card-body">
        <form>
            <div class="form-row">
                <div class="input-group col-md-4">
                    <input type="text" disabled class="form-control" id="disableinput" placeholder="Cari Data Siswa">
                    <div class="input-group-prepend">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalDataSiswa">
                        <i class="fa-solid fa-search"></i>
                    </button>
                    </div>
                </div>
            </div>
            <div class="form-row mt-3">
              <div class="form-group col-md-6">
                <label for="nisn">NISN</label>
                <input type="text" disabled class="form-control" id="nisn">
              </div>
              <div class="form-group col-md-6">
                <label for="nama">Kelas</label>
                <input type="text" disabled class="form-control" id="nama">
              </div>
              <div class="form-group col-md-6">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" id="tahun">
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal">Tanggal</label>
                <input type="text" disabled class="form-control" id="tanggal">
              </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#">
                <i class="fa-solid fa-circle-plus"></i> Tambah Data Pembayaran
            </button>
            @include('pembayaran.data')
            <div class="mt-3">
                <table class="table table-striped table-compact table-bordered" id="table-bayar">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th class="text-center">Bulan</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Nominal</th>
                            <th class="text-center" width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@push('scripts')
    <script>
        $('#table-bayar').DataTable();
    </script>
@endpush