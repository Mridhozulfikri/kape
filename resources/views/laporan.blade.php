@extends('layout/main')

@section('title' , 'laporan')
    
@section('container')
<title></title>

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
<body>
    <br>
    <div class="container">
        <h3 class="mt-2">Laporan Barang Masuk</h3>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        
        <table class="table table-bordered table-striped mb-0">
          <thead class="bg-info">
            <tr>
              <th scope="col">No</th>
              <th scope="col">TGL MASUK</th>
              <th scope="col">NAMA BARANG</th>
              <th scope="col">QTY</th>
              <th scope="col">TOTAL BELANJA</th>
             
            </tr>
          </thead>
          <tbody>
            @php 
            $no = 1;
            @endphp
  
            @foreach ($barangmasuks as $barang)
            <tr>
            
              <td>{{ $no++}}</td>
              <td>{{ $barang->created_at}}</td>
              <td>{{ $barang->nama_barang}}</td>
              <td>{{ $barang->qty}}</td>
              <td hidden>{{$qtyy = $barang->qty }}</td>
              <td hidden>{{$satuan = $barang->harga_satuan }}</td>
              <td hidden>{{$tot = $qtyy*$satuan}}</td>
            
            
            
            <td>Rp. {{number_format($tot)}}</td>
             
            </tr>
            @endforeach

          </tbody>
        </table>
      
      </div>
      <div align="right"> <br>
        <button  type="button" data-bs-toggle="modal" data-bs-target="#MODAL2" class="btn btn-success" >Cetak Laporan</button>
    </div>
    </div>
 

<hr>
<br>
<div class="container">
    <h3 class="mt-2">Laporan Barang Keluar</h3>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    
    <table class="table table-bordered table-striped mb-0">
      <thead class="bg-warning">
        <tr>
          <th scope="col">No</th>
          <th scope="col">TGL KELUAR</th>
          <th scope="col">NAMA BARANG</th>
          <th scope="col">TUJUAN</th>
          <th scope="col">QTY</th>
          <th scope="col">TOTAL UANG BARANG KELUAR</th>
         
        </tr>
      </thead>
      <tbody>
        @php 
        $no = 1;
        @endphp

        @foreach ($barangkeluar as $barang)
        <tr>
        
          <td>{{ $no++}}</td>
          <td>{{ $barang->created_at}}</td>
          <td>{{ $barang->nama_barang}}</td>
          <td>tujuan</td>
          <td>{{ $barang->qty}}</td>
          <td>{{ $barang->total}}</td>
         
        </tr>
        @endforeach

      </tbody>
    </table>
  
  </div>
  <div align="right"> <br>
    <button  type="button" data-bs-toggle="modal" data-bs-target="#MODAL2" class="btn btn-success" >Cetak Laporan</button>
</div>
</div>


<hr>
<br>
<div class="container">
    <h3 class="mt-2">Laporan Keuangan</h3>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    
    <table class="table table-bordered table-striped mb-0">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">TGL BELANJA</th>
          <th scope="col">TOTAL BELANJA</th>
          <th scope="col">TGL KELUAR</th>
          <th scope="col">TOTAL KELUAR</th>
        </tr>
      </thead>
      <tbody>
        @php 
        $no = 1;
        @endphp

        @foreach ($barangmasuks as $keluar)
        <tr>
          <td hidden>{{$keluar->harga_satuan}}</td>
          <td hidden>{{$qtyy = $keluar->qty }}</td>
          <td hidden>{{$satuan = $keluar->harga_satuan }}</td>
          <td hidden>{{$tot = $qtyy*$satuan}}</td>
          <td>{{ $no++}}</td>
          <td>{{ $keluar->created_at}}</td>
          <td>Rp. {{number_format($tot)}}</td>
          
          
        </tr>
        @endforeach

      </tbody>
    </table>
  
  </div>
  <div align="right"> <br>
    <button  type="button" data-bs-toggle="modal" data-bs-target="#MODAL2" class="btn btn-success" >Cetak Laporan</button>
</div>
</div>


</body>





@endsection