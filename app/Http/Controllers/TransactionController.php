<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = transaction::where('keterangan','LIKE','%' .$request->search.'%')->paginate(15);
        } else{
            $data = transaction::paginate(15);
        }
    
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

    public function filter(Request $request){
        $date = $request->get('sampai');
        $data = transaction::where('tanggal', 'like', '%' . $date . '%')
        ->paginate(10);
        return view('transaction.table', compact('data'));
    }
    
}
