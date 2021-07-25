<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Inventory;
use PDF;
use DB;



class BMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuks = DB::table('barangmasuk')->where('qty','>','0')->get();
        $lastID = BarangMasuk::getLastID();
      
        return view('barangmasuk',["lastID"=>$lastID], compact('barangmasuks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function generatePDFlbm(Request $request)

    {
        
        $lbm = BarangMasuk::all();
        
  
        
        $pdf = PDF::loadView('lbm',compact('lbm'));
        // return $pdf->download('suratjalan-pdf.pdf');
        // return view('lbm', compact('lbm'));
        // $barang = Barangkeluar::truncate();
        return $pdf->stream();
        

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $barangmasuk = new BarangMasuk;
        $inven = new Inventory;
        $barangmasuk->kode_barang = $request->get('kode_barang');
        $barangmasuk->nama_barang = $request->get('namabrg');
        $barangmasuk->qty = $request->get('qty');
        $barangmasuk->harga_satuan = $request->get('hrgsatuan');
        // $barangmasuk->jumlah_keseluruhan = null;
        $inven->kode_barang = $request->get('kode_barang');
        $inven->nama_barang = $request->get('namabrg');
        $inven->qty = $request->get('qty');
        $inven->harga_satuan = $request->get('hrgsatuan');

        $tot = $request->get('qty');
        $tit = $request->get('hrgsatuan');
        $toet = $tot * $tit;
        $inven->total = $toet;

        $inven->save();
        $barangmasuk->save();
        
        return redirect('barangmasuk')->with('added_success', 'Data Berhasil di Input');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = BarangMasuk::getBarang($id);
        
        return response()->json($barang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $barang = BarangMasuk::where('id', $request->get('id'))
        ->update([
            'kode_barang' => $request->get('kode_barang'),
            'nama_barang' => $request->get('namabrg'),
            'qty' => $request->get('qty'),
            'harga_satuan' => $request->get('hrgsatuan'),
            
        ]);
        $inven = Inventory::where('id', $request->get('id'))
        ->update([
            'kode_barang' => $request->get('kode_barang'),
            'nama_barang' => $request->get('namabrg'),
            'qty' => $request->get('qty'),
            'harga_satuan' => $request->get('hrgsatuan'),
            
        ]);

        return redirect('barangmasuk')->with('updated_success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $Barang = BarangMasuk::where('id', $request->get('id'))
        ->delete();
        // $inven = Inventory::where('id', $request->get('id'))
        // ->delete();

        

        return redirect('barangmasuk')->with('deleted_success', 'Data berhasil dihapus');
    }
}
