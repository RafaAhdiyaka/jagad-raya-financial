<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use PDF;

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
        if (request()->dari || request()->sampai) {
            $sampai = explode('-', request('sampai'));
            $sampai = $sampai[0]. '-' . $sampai[1] . '-' . intval($sampai[2]);
            $data = transaction::whereBetween('tanggal',[request('dari'), $sampai])->paginate(15);
        } else {
            $data = transaction::paginate(15);
        }

        return view('transaction.table', compact('data'));
    }

    public function exportpdf(){
        $data = Transaction::all();

       view()->share('data', $data);
       $pdf = PDF::loadview('transaction.tpdf');
       return $pdf->download('transaction.pdf');
        return 'success';
    }
    
}
