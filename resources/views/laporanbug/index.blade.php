@extends('templates.layout')

@push('style')

@endpush

@section('content')
<div class="card">
<div class="card-header">
    <h3 class="card-title">Halaman Laporan Bug</h3>
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
        <!-- Button Form Tambah laporan -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FormLaporanBug">
        <i class="fa-solid fa-circle-plus"></i> Tambah Data
        </button>

        <a href="{{ route('export-laporanbug') }}" class="btn btn-success">
            <i class="fa fa-file-excel"></i> Export
        </a>

        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
            <i class="fas fa-file-excel"></i> Import
        </button>
           


        @include('laporanBug.data')
        </div>
    <!-- /.card-body -->
</div>
@include('laporanBug.form')
@endsection

@push('scripts')
    <script>
        $('.alert-success').fadeTo(2000,500).slideUp(500, function(){
            $('.alert-succes').slideUp(500)
        })
        $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
            $('.alert-danger').slideUp(500)
        })

        $('#table-laporan').DataTable();

        $('.remove').on('click', function(){
            const data = $(this).closest('tr').find('td:eq(2)').text()
	    $('#hapus-data').text(data)
    	    const form = $(this).closest('tr').find('form')
            const route = $(this).data('route')
        $('#btn-confirm').on('click', function(){
            form.attr('action', route)
        	form.submit()
    	})
	    })

        $('#FormLaporanBug').on('show.bs.modal', function(e){
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = btn.data('mode')
            const id = btn.data('id')
            const jenis = btn.data('jenis')
            const deskripsi = btn.data('deskripsi')
            const tglKejadian = btn.data('tanggal_kejadian')
            const pelapor = btn.data('pelapor')
            const status = btn.data('status')

            if(mode == 'edit'){
                modal.find('.modal-title').text('Form Edit Laporan')
                modal.find('#jenis').val(jenis)
                modal.find('#deskripsi').val(deskripsi)
                modal.find('#tglKejadian').val(tglKejadian)
                modal.find('#pelapor').val(pelapor)
                modal.find('#status').val(status)
                modal.find('#method').html('@method("PATCH")')
                modal.find('form').attr('action',`{{ url('laporanbug') }}/${id}`)
            }else{
                modal.find('.modal-title').text('Form Tambah Laporan')
                modal.find('#jenis').val('')
                modal.find('#deksripsi').val('')
                modal.find('#tglKejadian').val('')
                modal.find('#pelaporan').val('')
                modal.find('#status').val('')
                modal.find('form').attr('action','{{ url("laporanbug") }}')
            }
        })

        $('[id=select]').on("change", function(){
            const form = $('#FormLaporan')
            const modal = $('#FormLaporanBug')
            const jenis = $(this).data('jenis')
            const deskripsi = $(this).data('deskripsi')
            const tglKejadian = $(this).data('tanggal_kejadian')
            const pelapor = $(this).data('pelapor')
            const id = $(this).data('id')
            var status = $(this).val()
            modal.find('#jenis').val(jenis)
            modal.find('#deskripsi').val(deskripsi)
            modal.find('#tglKejadian').val(tglKejadian)
            modal.find('#status').val(status)
            modal.find('#pelapor').val(pelapor)
            modal.find('#method').html('@method("PATCH")')
            modal.find('.modal-body form').attr('action', '{{ url("laporan") }}/'+id)
            form.submit();
            $('.tablelaporanbug').load('.tablelaporanbug');
        })
    </script>
@endpush
