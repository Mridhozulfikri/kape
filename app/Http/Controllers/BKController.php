<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use DB;
use PDF;

class BKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluars = Barangkeluar::all();
        $barangmasuks = DB::table('barangmasuk')->where('qty','>','0')->get();
        return view('transaksi', compact('barangkeluars','barangmasuks'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $barangkeluar = new Barangkeluar;
        
        $barangkeluar->kode_barang = $request->get('kodebrg');
        $barangkeluar->nama_barang = $request->get('namabarang');
        $barangkeluar->qty = $request->get('qty');
        $satuan = $request->get('hargasatuan');
        $bati =  $satuan * 0.3;
        $total = $bati + $satuan;
        $barangkeluar->harga_keluar=$total;
        $qty = $request->get('qty');
        $hasil = $qty * $total ;
        $barangkeluar->total = $hasil;
        $barangkeluar->save();

       

        return redirect('transaksi')->with('added_success', 'Data Berhasil di Input');
    
    }

    public function generatePDF(Request $request)

    {
        
        $barangkeluars = Barangkeluar::all();
        $tujuan = $request->get('tujuan');
        $pengirim = $request->get('pengirim');
        // $data = ['title' => 'Welcome to belajarphp.net'];
        
        $pdf = PDF::loadView('suratjalan',compact('barangkeluars','tujuan','pengirim'));
        // return $pdf->download('suratjalan-pdf.pdf');
        // return view('suratjalan', compact('barangkeluars','tujuan','pengirim'));
        // $barang = Barangkeluar::truncate();
        return $pdf->stream();
        

    }
    public function generatePDFlbk(Request $request)

    {
        
        $lbk = Barangkeluar::all();
        // $tujuan = $request->get('tujuan');
        // $pengirim = $request->get('pengirim');
        // $data = ['title' => 'Welcome to belajarphp.net'];
        
        $pdf = PDF::loadView('lbk',compact('lbk'));
        // return $pdf->download('suratjalan-pdf.pdf');
        // return view('suratjalan', compact('barangkeluars','tujuan','pengirim'));
        // $barang = Barangkeluar::truncate();
        return $pdf->stream();
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangkeluar = Barangkeluar::getBarang($id);

        return response()->json($barangkeluar);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
