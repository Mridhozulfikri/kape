@extends('layout/main')

@section('title' , 'Barang Keluar')
    
@section('container')

<style>
  .my-custom-scrollbar {
position: relative;
height: 300px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<div class="container">
  
  <div class="row">
    <div class="col">
      <h1 class="mt-2">Data Barang</h1>
      <p></p>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Kode Barang">
        <input class="form-control me-2" type="search" placeholder="Nama Barang">
        <button class="btn btn-outline-success" type="submit">Cari</button>
      </form>
      <p></p>


      <div class="table-wrapper-scroll-y my-custom-scrollbar">
        
        <table class="table table-bordered table-striped mb-0">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Stok</th>
              <th scope="col">Harga Satuan</th>

              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @php 
            $no = 1;
            @endphp
  
            @foreach ($barangmasuks as $barang)
            <tr>
            
              <td>{{ $no++}}</td>
              <td>{{ $barang->kode_barang}}</td>
              <td>{{ $barang->nama_barang}}</td>
              <td>{{ $barang->qty}}</td>
              <td>Rp. {{number_format($barang->harga_satuan)}}</td>
              {{-- <td hidden>{{$qtyy = $barang->qty }}</td>
              <td hidden>{{$satuan = $barang->harga_satuan }}</td>
              <td hidden>{{$tot = $qtyy*$satuan}}</td>
               --}}
              
              {{-- <td>{{$tot}}</td> --}}
              {{-- <td>{{ $barang->jumlah_keseluruhan}}</td> --}}
              <td>
                <button type="button" 
              data-bs-toggle="modal" 
              data-bs-target="#ADD"  
              id="btn-tambahkan-barang"
              data-id="{{$barang->id}}"
              data-kode-barang="{{$barang->kode_barang}}"
              data-nama-barang="{{$barang->nama_barang}}"
              data-qty="{{$barang->qty}}"
              data-harga-satuan="{{$barang->harga_satuan}}" 
              {{-- data-id="{{$barang->id}}"  --}}
              class="btn btn-warning">Tambahkan</button>
              </td>  
            </tr>
            @endforeach

          </tbody>
        </table>
      
      </div>

      
    </div>
    <div class="col">
      <h1 class="mt-2">Barang yang akan keluar</h1>
      <br>
      <br> 
      <p></p>

      <div class="table-wrapper-scroll-y my-custom-scrollbar">

        <table class="table table-bordered table-striped mb-0">
          <thead class="table-info">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga Keluar Per Item</th>
              <th scope="col">Qty</th>
              <th scope="col">Total</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @php 
            $no = 1;
            @endphp
  
            @foreach ($barangkeluars as $barang)
            <tr>
            
              <td>{{ $no++}}</td>
              <td>{{ $barang->kode_barang}}</td>
              <td>{{ $barang->nama_barang}}</td>
              <td>Rp. {{number_format($barang->harga_keluar)}}</td>
              <td>{{ $barang->qty}}</td>
              <td>Rp. {{number_format($barang->total)}}</td>
              <td>
                <button type="button" 
              data-bs-toggle="modal" 
              data-bs-target="#ADD"  
              id="btn-tambahkan-barang"
              data-id="{{$barang->id}}"
              data-kode-barang="{{$barang->kode_barang}}"
              data-nama-barang="{{$barang->nama_barang}}"
              data-qty="{{$barang->qty}}"
              data-harga-satuan="{{$barang->harga_satuan}}" 
              {{-- data-id="{{$barang->id}}"  --}}
              class="btn btn-warning">Hapus</button>
              </td>


              {{-- <td hidden>{{$qtyy = $barang->qty }}</td>
              <td hidden>{{$satuan = $barang->harga_satuan }}</td>
              <td hidden>{{$tot = $qtyy*$satuan}}</td>
               --}}
              
              {{-- <td>{{$tot}}</td> --}}
              {{-- <td>{{ $barang->jumlah_keseluruhan}}</td> --}}
              
            </tr>
            @endforeach
          
          </tbody>
        </table>
      </div>
      <br>
      <div align="right"> <br>
        <button  type="button" data-bs-toggle="modal" data-bs-target="#MODAL2" class="btn btn-success" >Cetak Surat Jalan</button>
    </div>
      
      
     
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="MODAL2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tujuan dan Operasional</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{action('BKController@generatePDF')}}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Masukan Alamat Tujuan</label>
            <input type="text" class="form-control" name="tujuan">
          </div>
          <div class="mb-3">
            <label class="form-label">Masukan Nama Pengirim</label>
            <input type="text" class="form-control" name="pengirim">
          </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Cetak</button>
        {{-- <a href="generatePDF" class="btn btn-info" target="_blank">CETAK PDF</a> --}}
      </form>
      </div>
    </div>
  </div>
      </div>
   {{-- end modal --}}
</div>

<!-- Modal jumlah yang akan dikeluarkan -->
<div class="modal fade" id="ADD" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Jumlah yang akan dikeluarkan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{action('BKController@store')}}" autocomplete="off" >
          @csrf
          <input type="text" name="id" id="edit-id" hidden>
          {{-- <input type="text" name="id" id="edit-harga" > --}}
          <input type="text" name="kodebrg" id="edit-kodebarang" hidden>
          <input type="text" name="hargasatuan" id="edit-hargasatuan" hidden>
          <div class="mb-3">
            <label  class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="namabarang"  id="edit-namabarang" readonly>
          <div class="mb-3  ">
            <label  class="form-label">Qty</label>
            <input type="text" class="form-control" name="qty"  id="edit-qty">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="btn-jumlah-barang">Oke</button>
      </form>
      
      </div>
    </div>
  </div>
</div>

<script src="jquery/jquery.min.js"></script>
<script type="text/javascript">
  
  
</script>
<script>

  $(document).on('click','#btn-tambahkan-barang',function(){
      let id = $(this).data('id');

        // AJAX untuk menampilkan data update
      $.ajax({
        type: "get",
        url: 'transaksi/'+id,
        dataType: 'json',
        success: function(res){
            // console.log(res);
            $('#edit-id').val(res[0].id);
             $('#edit-namabarang').val(res[0].nama_barang);
             $('#edit-kodebarang').val(res[0].kode_barang);
             $('#edit-hargasatuan').val(res[0].harga_satuan);
            //  $('#edit-keterangan').text(res[0].keterangan);
            $('#edit-qty').val(res[0].qty);
          
      
            //  $('#edit-status option').filter(function(){
            //      return ($(this).val()== res[0].status);
            //  }).prop('selected', true);
        }
      });

      
  });
  

 

  //   $(document).on('click','#btn-restore-pegawai',function(){
  //     let id_pegawai = $(this).data('id_pegawai');
  //     $('#restore-id_pegawai').val(id_pegawai);

  //   });

  //   $(document).on('click','#btn-force-delete-pegawai',function(){
  //     let id_pegawai = $(this).data('id_pegawai');
  //     $('#force-delete-id_pegawai').val(id_pegawai);

  //   });
  function jumlah(){

var a,b,c; //membuat variabel
a=Number(document.getElementById("edit-hargasatuan").value); //menangkap input angka pertama
b=Number(document.getElementById("edit-qty").value); //menangkap input angka kedua
c = a * b; //melakukan penjumlahan
document.getElementById('answer').innerHTML =" Hasilnya adalah " +  c;
}
</script>


      



@endsection 