@extends('templates.layout')

@push('style')

@endpush

<!--content-->
@section('content')
            <!-- form -->
            <div class="card">
                <div class="card-header">
                    <h3>Simulasi Penjualan Aksesoris</h3>
                </div>
                <div class="card-body">
                    <form id="formPenjualan">
                        <div class="form-group row">
                            <label for="no_transaksi" class="col-sm-2 col-form-label">No Transaksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" no_transaksi="no_transaksi" name="no_transaksi" placeholder="no_transaksi" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_barang" class="col-sm-2 col-form-label">Barang Dibeli</label>
                            <div class="col-sm-10">
                            <select name="nama_barang" id="nama_barang" class="form-control" required>
                                <option value="" selected disabled hidden></option>
                                <option value="gantungan kunci">Gantungan Kunci</option>
                                <option value="ikat rambut">Ikat Rambut</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Beli</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah_beli">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_beli" class="col-sm-2 col-form-label">Tanggal Beli</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl_beli" name="tgl_beli" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="warna_aksesoris" class="col-sm-2 col-form-label">Warna</label>
                            <div class="col-sm-10">
                            <select name="warna_aksesoris" id="warna_aksesoris" class="form-control" required>
                                <option value="" selected disabled hidden></option>
                                <option value="kuning">Kuning</option>
                                <option value="putih">Putih</option>
                                <option value="merah">Merah</option>
                                <option value="hijau">Hijau</option>
                                <option value="biru">Biru</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pembeli" class="col-sm-2 col-form-label">Nama Pembeli</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" placeholder="nama_pembeli">
                            </div>
                        </div>
                        <div class="form-group row">
                              <label for="id" class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-10">
                                  <button id="btn-insert" class="btn btn-secondary" type="submit">Simpan</button>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Tabel Data -->
            <div class="card">
                <div class="card-header">
                    <h3>Data Penjualan</h3>
                </div>
                <div class="card-body">
                    <div class="mt-2 mb-2">
                      <div class="form-group row mt-2">
                          <div class="col-sm-4">
                            <input type="search" class="form-control" id="teks-cari" name="teks-cari">
                          </div>
                          <div class="col-sm-2">
                            <button id="btn-search" class="btn btn-secondary" type="button">Cari</button>
                          </div>
                          <div class="col-sm-2">
                             <button class="btn btn-success" id="btn-sorting" type="button">Urutkan</button>
                          </div>
                      </div>
                    <table class="table table-compact table-stripped table-bordered" id="tblPenjualan">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Barang</th>
                                <th>warna Aksesoris</th>
                                <th>Harga</th>
                                <th>Jumlah Beli</th>
                                <th>Nama Pelanggan</th>
                                <th>Diskon</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" align="center">Belum ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection

@push('scripts')
<script>
    console.log('test')
    // }
    function insertData(dataPenjualan){
      //contoh Constanta, Constanta adalah variable yang nilainya tidak bisa diubah setelah dideklarasikan
      const data = $('#formPenjualan').serializeArray()
      // console.log(data)

      let newData = {}
      data.forEach(function(item, index){
        let name = item['name']
        let value = name === 'id' || name === 'jumlah' ? Number(item['value']) : item['value']
        newData[name] = value
      })
      console.log(newData)

      localStorage.setItem('dataPenjualan', JSON.stringify([...dataPenjualan, newData]))
      return newData
    }

    // pengulangan
    // Searching => menggunakan sequential search -> memeriksa setiap elemen dalam array satu per satu, dari awal hingga akhir array, sampai elemen yang dicari ditemukan -> mencari data satu persatu
    function searching(arr, key, teks){
      for(let i= 0; i < arr.length; i++){
        if(arr[i][key] == teks)
          return i
        }
      return -1
    }

    // Sorting => menggunakan insertSort-> mengurutkan sebuah array dengan cara memasukkan setiap elemen ke posisi yang tepat pada sub-array yang telah diurutkan sebelumnya -> memasukan data baru ke posisi yang tepat pada data yang sudah diurutkan
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
    //contoh Function, function adalah tipe data yang bisa disimpan di dalam variabel
    function showData(arr){
    let row = ''
    if(arr.length == 0){
        return row = `<tr><td colspan="6">Belum ada data</td></tr>`
    }
    let jmlHarga = jmlQty = jmlDiskon = jmlTotal = 0
        arr.forEach(function(item, index){
            // contoh variable, Variabel adalah simbolik yang digunakan untuk menyimpan suatu nilai atau data di pemrograman
            let harga = item['nama_barang'] == 'gantungan kunci' ? 5000 : 2500
            let subtotal = item['jumlah'] * harga
            let diskon = item['jumlah'] >= 10 || subtotal >= 30000 ?  subtotal * 0.20 : 0
            let total = subtotal - diskon
            jmlHarga += harga

            jmlQty += item['jumlah']
            jmlDiskon += diskon
            jmlTotal += total

            row += `<tr>`
            // contoh Array, array adalah sebuah objek di js yang digunakan untuk menyimpan suatu nilai atau elemen di satu variabel atau bisa disebut juga perkumpulan data
            row += `<td>${item['no_transaksi']}</td>`
            row += `<td>${item['tgl_beli']}</td>`
            row += `<td>${item['nama_barang']}</td>`
            row += `<td>${item['warna_aksesoris']}</td>`
            row += `<td>${harga}</td>`
            row += `<td>${item['jumlah']}</td>`
            row += `<td>${item['nama_pembeli']}</td>`
            row += `<td>${diskon}</td>`
            row += `<td>${total}</td>`
            row += `</tr>`
        })
        row += '<tr style="font-weight:bold;background:#000;color:white">'
        row += `<td colspan="4">Jumlah Total</td>`
        row += `<td>${jmlHarga}</td>`
        row += `<td>${jmlQty}</td>`
        row += `<td></td>`
        row += `<td>${jmlDiskon}</td>`
        row += `<td>${jmlTotal}</td>`
        row += '</tr>'

      return row
    }

    $(function(){
        let dataPenjualan = JSON.parse(localStorage.getItem('dataPenjualan')) || []
        $('#tblPenjualan tbody').html(showData(dataPenjualan))

        //event klik input data
        $('#btn-insert').on('click',function(e){
            e.preventDefault()
            dataPenjualan.push(insertData(dataPenjualan))
            $('#tblPenjualan tbody').html(showData(dataPenjualan))
        })

        //event klik searching
        $('#btn-search').on('click',function(e){
            let teksSearch = $('#teks-cari').val()
            let nama_pembeli = searching(dataPenjualan,'nama_pembeli', teksSearch)
            let data = []
            if(nama_pembeli >= 0)
            // Push() -> untuk menambahkan satu atau lebih elemen ke akhir array dan mengembalikan panjang array yang baru setelah penambahan
            data.push(dataPenjualan[nama_pembeli])
            console.log(nama_pembeli)
            console.log(data)
            $('#tblPenjualan tbody').html(showData(data))
        })

         //event klik sorting
        $('#btn-sorting').on('click',function(){
            dataPenjualan = sorting(dataPenjualan, 'nama_pelanggan')

            $('#tblPenjualan tbody').html(showData(dataPenjualan))
        })

    } )
</script>
@endpush
