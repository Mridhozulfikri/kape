@extends('layout/main')

@section('title' , 'Stok Update')
    
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
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Harga Total</th>
                    {{-- <th scope="col">Jumlah Keseluruhan</th> --}}
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                
                
                <tr>
                    
                    <td>memek</td>
                    <td>memek</td>
                    <td>memek</td>
                    <td>memek</td>
                    <td>memek</td>
                    <td>memek</td>
                    
                </tr>
                
                
                
                
            </tbody>
        </table>
        
</div>
        
        
        
        
        @endsection