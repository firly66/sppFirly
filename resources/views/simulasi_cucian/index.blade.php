@extends('templates.layout')

@push('style')
@endpush

@section('content')

{{-- Content Header
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    </div>
    </div>
</section> --}}

{{-- Main Content & Form --}}
<section class="content">
<div class="card">
    <div class="card-header">
        <h3>Form</h3>
    </div>
    <div class="card-body">
    <form id="formKaryawan" action="produk">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" value="" name="id">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" value="" name="nama">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">No. Hp/Wa</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nophone" value="" name="nophone" autofocus required>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Jenis Cucian</label>
            <div class="col-sm-10">
              <select class="form-control" id="JenisCucian" value="" name="JenisCucian" required>
              <option value="standar">Standar</option>
              <option value="express">Express</option>
              </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="form-check col-sm-2">
                <input class="form-check-input" type="radio" value="L" name="jk" id="jk">
            <label class="form-check-label">Laki - Laki</label>
            </div>
            <div class="form-check col-sm-2">
                <input class="form-check-input" type="radio" value="P" name="jk" id="jk">
            <label class="form-check-label">Perempuan</label>
            </div>
        </div>
        <div class="form-group row">
            <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="gaji" value="" name="gaji" min="1000000" step="50000" value="1000000">
            </div>
        </div>
        <div class="form-group row">
            <label for="lembur" class="col-sm-2 col-form-label">Lembur</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="lembur" value="" name="lembur" min="0" step="1" value="0" required>
            </div>
            <div class="col-sm-1">Hari</div>
        </div>
        <div class="form-group row">
            <label for="nama-produk" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-2">
                <button class="form-control btn btn-primary" id="btn-insert" type="button">Submit</button>
            </div>
        </div>
    </div>
</div>
</form>

{{-- Data & Table --}}
<div class="card">
    <div class="card-header">
        <h3>Data</h3>
    </div>
    <div class="card-body">
        <div class="mt-2 mb-2">
            <div class="form-group row mt-2">
              <div class="col-sm-2">
                 <button class="btn btn-success" id="btn-sorting" type="button">Urutkan</button>
              </div>
              <div class="col-sm-4">
                <input type="search" class="form-control" id="teks-cari">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-secondary" id="btn-searching" type="button">Cari</button>
              </div>
          </div>
        <table class="table table-compact table-bordered table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Gaji</th>
                <th>Lembur</th>
                <th>Bonus</th>
                <th>Pajak</th>
                <th>Total Gaji</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="8" align="center">Belum ada data</td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
</section>

@endsection

@push('scripts')
<script>
    const hargaLembur = 100000

        $(function(){


let dataCucian = JSON.parse(localStorage.getItem('dataCucian')) || []
        $('#data-pegawai tbody').html(showData(dataCucian))


    //event klik input data
    $('#btn-insert').on('click',function(e){
            e.preventDefault()
            dataCucian.push(insertData(dataCucian))
            $('#data-pegawai tbody').html(showData(dataCucian))
        })

    //event klik sorting
    $('#btn-sorting').on('click',function(){
            dataCucian = sorting(dataCucian, 'nama')
            $('#data-pegawai tbody').html(showData(dataCucian))
        })

    //event klik searching
    $('#btn-search').on('click',function(){
            let teksSearch = $('#teks-cari').val()
            let id = searching(dataCucian,'nama', teksSearch)
            let data = []
            if(id >= 0)
            data.push(dataCucian[id])
            console.log(id)
            console.log(data)
            $('#data-pegawai tbody').html(showData(data))
        })
        })


    // Function Insert Data
    function insertData(dataCucian){
      const data = $('#form-cucian').serializeArray()
      // console.log(data)

      let newData = {}
      data.forEach(function(item, index){
        let name = item['name']
        let value = name === 'id' || name == 'gaji' || name == 'lembur' ? Number(item['value']) : item['value']
        newData[name] = value
      })
      console.log(newData)

      localStorage.setItem('dataCucian', JSON.stringify([...dataCucian, newData]))
      return newData
    }



    // Function Show Data
    function showData(arr){
      let row = ''

      if(arr.length == 0){
        return row = `<tr><td colspan="3" align="center">Belum ada data</td></tr>`
      }

      let jmlBerat = jmlDiskon = jmlTotal = jmlBonus = jmlPajak = 0

      arr.forEach(function(item, index){
        let harga = item['jenisCucian'] == 'standar' ? 7500 : 10000
        let jmlHarga = harga * item['berat']
        let diskon = jmlHarga >= 50000 ? harga * 0.1 : 0
        let total = jmlHarga - diskon

        jmlBerat += item['berat']
        jmlDiskon += diskon
        jmlTotal += total

        row += `<tr>`
        row += `<td>${item['id']}</td>`
        row += `<td>${item['nama']}</td>`
        row += `<td>${item['nophone']}</td>`
        row += `<td>${item['tgl']}</td>`
        row += `<td>${item['jenisCucian']}</td>`
        row += `<td>${item['berat']}</td>`
        row += `<td>${diskon}</td>`
        row += `<td>${total}</td>`
        row += `</tr>`

      })
      row += `<tr style="font-weight:bold; background:#5c5e60; color:white">`
      row += `<td colspan="5">Jumlah Total</td>`
      row += `<td>${jmlBerat}</td>`
      row += `<td>${jmlDiskon}</td>`
      row += `<td>${jmlTotal}</td>`
      row += `<tr>`

      return row
    }

    // Function Sorting Data
    function sorting(arr,key){
      let i,  j, id, value;
      for (i = 1; i < arr.length; i++)
      {
          value = arr[i];
          id = arr[i][key]
          j = i - 1;
          while (j >= 0 && arr[j][key] > id)
          {
              arr[j + 1] = arr[j];
              j = j - 1;
          }
          arr[j + 1] = value;
      }
      return arr
    }

    // Function Searching Data
    function searching(arr, key, teks){
      for(let i= 0; i < arr.length; i++){
        if(arr[i][key] == teks)
          return i
        }
      return -1
    }



</script>
@endpush
