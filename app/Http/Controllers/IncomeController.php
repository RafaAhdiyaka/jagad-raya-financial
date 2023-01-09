<?php

namespace App\Http\Controllers;

use App\Models\income;
use Illuminate\Http\Request;
use PDF;

class IncomeController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = income::where('keterangan','LIKE','%' .$request->search.'%')->paginate(15);
        } else{
            $data = income::paginate(10);
        }
    
        return view('income.table', compact('data'));
    }

    public function create(){
        return view('income.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'tanggal' => 'required',
            'keterangan' => 'required',
            'jumlah_pemasukan' => ['required','numeric'],
        ]);
        income::create($request->all());   
        return redirect()->route('income')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){

        $data = income::find($id);
        return view('income.formedit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = income::find($id);
        $data->update($request->all());
        return redirect()->route('income')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id){
        $data = income::find($id);
        $data->delete();
        return redirect()->route('income')->with('success', 'Data Berhasil Didelete');
    }

    public function filter(Request $request){
        if (request()->dari || request()->sampai) {
            $sampai = explode('-', request('sampai'));
            $sampai = $sampai[0]. '-' . $sampai[1] . '-' . intval($sampai[2]);
            $data = income::whereBetween('tanggal',[request('dari'), $sampai])->paginate(15);
        } else {
            $data = income::paginate(15);
        }

        return view('income.table', compact('data'));
    }

    public function exportpdf(){
        $data = Income::all();

       view()->share('data', $data);
       $pdf = PDF::loadview('income.ipdf');
       return $pdf->download('income.pdf');
        return 'success';
    }
}
