<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Model;

class Inventory extends Model

// konfigurasi koneksi database
{
    protected $table ='inventory';
    protected $primarykey ='id';
    public $incrementing = true;
    protected $keytype ='int';
    
    // konfigurasi kolom yang akan diisi
    // table barang masuk
    
    protected $fillable = [
        'id',
        'kode_barang',
        'nama_barang',
        'qty',
        'harga_satuan', 
        'jumlah_keseluruhan',
        'qty'
    ];
    
}


