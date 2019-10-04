<?php

namespace App\Http\Controllers;
use App\modelPenyewa;
use App\modelBarang;
use Illuminate\Http\Request;
use Validator;

class penyewaan extends Controller{
  
  public function index(){
    $data = modelPenyewa::all();
    return view('penyewaan', compact('data'));
    // return view('newkontak', compact('data'));
  }

  public function create(){
    
    $data = modelPenyewa::all();
    return view('penyewaan_create', compact('data'));
  }

  public function store(Request $request){
    $this->validate($request,[
        'namap' => 'required',
        'namab' => 'required',
        'jmlbarang' => 'required',
        'tglpinjam' => 'required',
        'tglpengem' => 'required',
    ]);
 
    //ini yang menambah data penyewaan
    $data = new modelPenyewa();
    $data->namap = $request->namap;
    $data->namab = $request->namab;
    $data->jmlbarang = $request->jmlbarang;
    $data->tglpinjam = $request->tglpinjam;
    $data->tglpengem = $request->tglpengem;
    $data->save();


      // //ini merubah data dari controller barang
      // $dataPenyewa = modelPenyewa::where('code', $request->namab)->first();
      // $dataPenyewa->stok = $dataPenyewa->stok + $request->jumlah;
      // $dataPenyewa->save();

    return redirect()->route('penyewaan.index')->with('alert_message', 'Berhasil menambah data!');
  }

  public function edit($id)
  {
    $data = modelPenyewa::where('id', $id)->get();
    return view('penyewaan_edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
      $this->validate($request, [

        'namap' => 'required',
        'namab' => 'required',
        'jmlbarang' => 'required',
        'tglpinjam' => 'required',
        'tglpengem' => 'required',
      ]);

      
      $data = modelPenyewa::where('id', $id)->first();
        $data->namap = $request->namap;
        $data->namab = $request->namab;
        $data->jmlbarang = $request->jmlbarang;
        $data->tglpinjam = $request->tglpinjam;
        $data->tglpengem = $request->tglpengem;
        $data->save();


      return redirect()->route('penyewaan.index')->with('alert_message', 'Berhasil mengubah data data!');
  }

  public function destroy($id)
  {
    $data = modelPenyewa::where('id', $id)->first();
    $data->delete();

    return redirect()->route('penyewaan.index')->with('alert_message', 'Berhasil menghapus data!');
  }

}
