<?php

namespace App\Http\Controllers;

use App\Models\income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index(){

    $data = income::all();
        return view('income.table', compact('data'));
    }

    public function create(){
        return view('income.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'tanggal' => 'required',
            'keterangan' => 'required',
            'jumlah_pemasukan' => 'required',
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
}
