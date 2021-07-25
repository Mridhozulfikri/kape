@extends('layout/main')

@section('title' , 'Invoice')
    
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
  
 <div><p></p></div>  

<div class="container">

    
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        
        <table class="table table-bordered table-striped mb-0">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal Keluar</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Total</th>
              <th scope="col">Status</th>

              

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
              <td>Rp. {{number_format($barang->harga_satuan)}}</td>
              
             
              
              
              
             
            
              
  
            </tr>
            @endforeach
            
           
          
          </tbody>
        </table>
      
      </div>
   
        
        
        
        @endsection