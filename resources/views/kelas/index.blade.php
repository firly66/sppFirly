
@extends('templates.layout')

@push('style')

@endpush

@section('content')
<div class="card">
<div class="card-header">
    <h3 class="card-title">Halaman Kelola Kelas</h3>
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
        <!-- Button Form Tambah Kelas -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FormTambahKelas">
        <i class="fa-solid fa-circle-plus"></i> Tambah Data Kelas
        </button>
        @include('kelas.data')
        </div>
    <!-- /.card-body -->
</div>
@include('kelas.form')
@endsection

@push('scripts')
    <script>
        $('.alert-success').fadeTo(2000,500).slideUp(500, function(){
            $('.alert-succes').slideUp(500)
        })
        $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
            $('.alert-danger').slideUp(500)
        })

        $('#table-kelas').DataTable();
        
        $('.remove').on('click', function(){
            const data = $(this).closest('tr').find('td:eq(1)').text()
	    $('#hapus-data').text(data)
    	    const form = $(this).closest('tr').find('form')
        $('#btn-confirm').on('click', function(){
        	form.submit()
    	})
	    })

        $('#FormTambahKelas').on('show.bs.modal', function(e){
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = btn.data('mode')
            const id_kelas = btn.data('id_kelas')
            const nama_kelas = btn.data('nama_kelas')
            const kompetensi_keahlian = btn.data('kompetensi_keahlian')

            if(mode == 'edit'){
                modal.find('.modal-title').text('Form Edit Kelas')
                modal.find('#nama_kelas').val(nama_kelas)
                modal.find('#kompetensi_keahlian').val(kompetensi_keahlian)
                modal.find('#method').html('@method("PATCH")')
                modal.find('form').attr('action',`{{ url('tingkat') }}/${id_kelas}`)
            }else{
                modal.find('.modal-title').text('Form Tambah Guru')
                modal.find('#nama_kelas').val('')
                modal.find('#kompetensi_keahlian').val('')
                modal.find('form').attr('action','{{ url("tingkat") }}')
            }
        })
    </script>
@endpush