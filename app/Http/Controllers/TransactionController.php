<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Outcome;
use App\Models\transaction;
use Illuminate\Http\Request;
use PDF;

class TransactionController extends Controller
{
    public function index(Request $request){
        $transaksi = Transaction::all();
        $income = Income::all();
        $outcome = Outcome::all();
        if($request->has('search')){
            $transaksi = transaction::where('keterangan','LIKE','%' .$request->search.'%')->paginate(15);
        } else{
            $transaksi = transaction::paginate(10);
        }
    
        return view('transaction.table',[
            'transaksi' => $transaksi,
            'income' => $income,
            'outcome' =>$outcome
        ],compact('transaksi'));
    }

    public function create(){
        return view('transaction.add',[
            'transaksi' => Transaction::all(),
            'income' => Income::all(),
            'outcome' => Outcome::all(),
        ]);
    }


    public function store(Request $request){
        $this->validate($request, [
            'tanggal' => ['required'],
            'keterangan' => ['required'],
            'income_id' => ['required'],
            'outcome_id' => ['required'],
        ]);
        Transaction::create($request->all());
        return redirect()->route('transaction')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        return view('transaction.formedit',[
        'transaksi' => Transaction::find($id),
        'income' => Income::all()->sortBy('jumlah_pemasukan'),
        'outcome' => Outcome::all('jumlah_pengeluaran'),
        ]);
    }

    public function update(Request $request, $id){
        $transaksi = transaction::find($id);
        $transaksi->update($request->all());
        return redirect()->route('transaction')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id){
        $transaksi = transaction::find($id);
        $transaksi->delete();
        return redirect()->route('transaction')->with('success', 'Data Berhasil Didelete');
    }

    public function filter(Request $request){
        if (request()->dari || request()->sampai) {
            $sampai = explode('-', request('sampai'));
            $sampai = $sampai[0]. '-' . $sampai[1] . '-' . intval($sampai[2]);
            $transaksi = transaction::whereBetween('tanggal',[request('dari'), $sampai])->paginate(15);
        } else {
            $transaksi = transaction::paginate(15);
        }

        return view('transaction.table',compact('transaksi'));
    }

    public function exportpdf(){
        $transaksi = Transaction::all();

       view()->share('transaksi', $transaksi);
       $pdf = PDF::loadview('transaction.tpdf');
       return $pdf->download('transaction.pdf');
        return 'success';
    }
    
}
