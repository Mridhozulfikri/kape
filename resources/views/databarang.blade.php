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
              <th scope="col">  Total</th>
              {{-- <th scope="col">Jumlah Keseluruhan</th> --}}

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
             
              
              
              
              <td>Rp. {{number_format($barang->total)}}</td>
            
              
  
            </tr>
            @endforeach
            
           
          
          </tbody>
        </table>
      
      </div>
      {{-- modal edit barang --}}

<div class="modal fade" id="EDIT" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Barang Masuk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{action('BMController@update','update')}}" autocomplete="off" >
            @method('PATCH')
            @csrf
            <input type="text" name="id" id="edit-id" hidden>
            <div class="mb-3">
                <label for="recipient-name"  class="col-form-label">Kode Barang:</label>
                <input type="text" name="kode_barang" class="form-control" id="edit-kodebarang" readonly>
            </div>
            <div class="mb-3">
                <label for="recipient-name"  class="col-form-label">Nama Barang:</label>
                <input type="text" name="namabrg" class="form-control" id="edit-namabarang">
            </div>
            <div class="mb-3">
                <label for="recipient-name"  class="col-form-label">Qty:</label>
                <input type="text" name="qty" class="form-control" id="edit-qty">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Harga Satuan:</label>
                <input type="text" name="hrgsatuan" class="form-control" id="edit-hargasatuan">
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Konfirmasi</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  
  {{-- modal hapus --}}
  
  <div class="modal fade" id="HAPUS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button> --}}
        </div>
        <form method="post" action="{{action('BMController@destroy','delete')}}" >
          @method('DELETE')
          @csrf
            <div class="modal-body">
              Yakin Untuk Menghapus Barang ?
            </div>
            <input type="text" name="id" id="delete-id" hidden>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" >Hapus</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </form>
            </div>
       
      </div>
    </div>
  </div>
  
  <script src="jquery/jquery.min.js"></script>
  <script>
    $(document).on('click','#btn-edit-barang',function(){
        let id = $(this).data('id');
  
          // AJAX untuk menampilkan data update
        $.ajax({
          type: "get",
          url: 'barangmasuk/'+id,
          dataType: 'json',
          success: function(res){
              // console.log(res);
              $('#edit-id').val(res[0].id);
               $('#edit-kodebarang').val(res[0].kode_barang);
               $('#edit-namabarang').val(res[0].nama_barang);
              //  $('#edit-keterangan').text(res[0].keterangan);
              $('#edit-qty').val(res[0].qty);
              $('#edit-hargasatuan').val(res[0].harga_satuan);
        
              //  $('#edit-status option').filter(function(){
              //      return ($(this).val()== res[0].status);
              //  }).prop('selected', true);
          }
        });
  
        
    });
  
    $(document).on('click','#btn-hapus-barang',function(){
        let id = $(this).data('id');
        $('#delete-id').val(id);
  
      }); 
  
    //   $(document).on('click','#btn-restore-pegawai',function(){
    //     let id_pegawai = $(this).data('id_pegawai');
    //     $('#restore-id_pegawai').val(id_pegawai);
  
    //   });
  
    //   $(document).on('click','#btn-force-delete-pegawai',function(){
    //     let id_pegawai = $(this).data('id_pegawai');
    //     $('#force-delete-id_pegawai').val(id_pegawai);
  
    //   });
      
  </script>
        
        
        
        @endsection