<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Model;
use DB;
class BarangMasuk extends Model

// konfigurasi koneksi database
{
    protected $table ='barangmasuk';
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
        'jumlah_keseluruhan'
    ];

public function barangkeluar(){
    return $this->hasOne(Barangkeluar::class);
}

//Untuk Ajax
public static function getBarang($id){

    $barang = BarangMasuk::where('id',$id)->get();
    return $barang;

}

static function getLastID(){
    $getLastData = DB::table('barangmasuk')->orderBy('kode_barang','DESC')->first();
    if(empty($getLastData)){
        return 'B001';
    }else{
        
        if(empty($getLastData->kode_barang)){
            return 'B001';
        }else{

            $temp = $getLastData->kode_barang;
            $removeInitial = substr($temp,1);
            $increment = $removeInitial + 1;
            $arrange = 'B'.sprintf('%03d',$increment);

            return $arrange;
        }
        
    }
   


}
}


