<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){

        $data = transaction::all();
        return view('transaction.table', compact('data'));
    }

    public function create(){
        return view('transaction.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'tanggal' => 'required',
            'category_id' => 'required',
            'keterangan' => 'required',
            'jumlah_pemasukan_id' => 'required',
            'jumlah_pengeluaran_id' => 'required',
        ]);
        transaction::create($request->all());   
        return redirect()->route('transaction')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){

        $data = transaction::find($id);
        return view('transaction.formedit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = transaction::find($id);
        $data->update($request->all());
        return redirect()->route('transaction')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id){
        $data = transaction::find($id);
        $data->delete();
        return redirect()->route('transaction')->with('success', 'Data Berhasil Didelete');
    }
    
}
