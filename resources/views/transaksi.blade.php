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
              <th scope="col">Harga Masuk</th>
              <th scope="col">Stok</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>
                <button type="button" data-bs-toggle="modal" data-bs-target="#MODAL1" class="btn btn-primary">Tambahkan</button>
                
              
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Jacob</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <th scope="row">6</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
          
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
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga Keluar Per Item</th>
              <th scope="col">Qty</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <th scope="row">6</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
          
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
        <h5 class="modal-title" id="staticBackdropLabel">Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Masukan Alamat Tujuan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Masukan Nama Pengirim</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success">Cetak</button>
      </div>
    </div>
  </div>
      </div>
   {{-- end modal --}}
</div>

<!-- Modal -->
<div class="modal fade" id="MODAL1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Jumlah yang akan dikeluarkan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </form>
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Qty</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Oke</button>
      </div>
    </div>
  </div>
</div>




@endsection 