<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangkeluar extends Model
{
    protected $table ='barangkeluar';
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
        'harga_keluar', 
        'total'
    ];
    public function barangmasuk(){
        return $this->belongsTo(Barangkeluar::class,'id','barang_id');
    }
    
    public static function getBarang($id){

        $barang = BarangMasuk::where('id',$id)->get();
        return $barang;
    
    }
}
