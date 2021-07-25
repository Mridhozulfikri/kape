<!DOCTYPE html>
<html>
<head>
	<title>Surat Jalan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<p>@php
		date_default_timezone_set('Asia/Jakarta');
		echo '' . date('j F, Y');
		@endphp</p>
      {{-- <p>Tujuan : {{$tujuan}}</p>
      <p>Pengirim : {{$pengirim}}</p> --}}
     
	<center>
		<h5>Laporan Barang Keluar</h4>
	</center>
	
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th scope="col">No</th>
                <th scope="col">TGL KELUAR</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">TUJUAN</th>
                <th scope="col">QTY</th>
			</tr>
		</thead>
		<tbody>
			@php
			$no = 1;   
		@endphp
  
		@foreach ($lbk as $surat)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{ $surat->created_at}}</td>
            <td>{{ $surat->nama_barang}}</td>
            <td>tujuan</td>
            <td>{{ $surat->qty}}</td>
                
			</tr>
		@endforeach
		  </tbody>
	</table>
</body>
</html>