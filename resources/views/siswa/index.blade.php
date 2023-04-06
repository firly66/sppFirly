@extends('templates.layout')

@push('style')

@endpush

@section('content')
<div class="card">
<div class="card-header">
    <h3 class="card-title">Halaman Kelola Siswa</h3>
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
        {{-- Alert Sukses --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        {{-- Alert Gagal --}}
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- Button Form Tambah Siswa -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FormTambahSiswa">
        <i class="fa-solid fa-circle-plus"></i> Tambah Data Siswa
        </button>
        @include('siswa.data')
        </div>
    <!-- /.card-body -->
</div>
@include('siswa.form')
@endsection

@push('scripts')
    <script>
        $('.alert-success').fadeTo(2000,500).slideUp(500, function(){
            $('.alert-succes').slideUp(500)
        })
        $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
            $('.alert-danger').slideUp(500)
        })

        $('#table-siswa').DataTable();
        
        $('.remove').on('click', function(){
            const data = $(this).closest('tr').find('td:eq(3)').text()
	    $('#hapus-data').text(data)
    	    const form = $(this).closest('tr').find('form')
        $('#btn-confirm').on('click', function(){
        	form.submit()
    	})
	    })

        $('#FormTambahSiswa').on('show.bs.modal', function(e){
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = btn.data('mode')
            const nisn = btn.data('nisn')
            const nis = btn.data('nis')
            const nama = btn.data('nama')
            const id_kelas = btn.data('id_kelas')
            const alamat = btn.data('alamat')
            const no_telp = btn.data('no_telp')
            const id_spp = btn.data('id_spp')

            if(mode == 'edit'){
                modal.find('.modal-title').text('Form Edit Siswa')
                modal.find('#nisn').val(nisn)
                modal.find('#nis').val(nis)
                modal.find('#nama').val(nama)
                modal.find('#id_kelas').val(id_kelas)
                modal.find('#alamat').val(alamat)
                modal.find('#no_telp').val(no_telp)
                modal.find('#id_spp').val(id_spp)
                modal.find('#method').html('@method("PATCH")')
                modal.find('form').attr('action',`{{ url('siswa') }}/${nisn}`)
            }else{
                modal.find('.modal-title').text('Form Tambah Siswa')
                modal.find('#nisn').val('')
                modal.find('#nis').val('')
                modal.find('#nama').val('')
                modal.find('#id_kelas').val('')
                modal.find('#alamat').val('')
                modal.find('#no_telp').val('')
                modal.find('#id_spp').val('')
                modal.find('form').attr('action','{{ url("siswa") }}')
            }
        })
    </script>
@endpush