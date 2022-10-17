<?php

namespace App\Http\Controllers;

use App\Models\outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    public function index(){

        $data = outcome::all();
            return view('outcome.table', compact('data'));
        }

        public function create(){
            return view('outcome.add');
        }
    
        public function store(Request $request){
            $this->validate($request, [
                'tanggal' => 'required',
                'keterangan' => 'required',
                'jumlah_pengeluaran' => 'required',
            ]);
            outcome::create($request->all());   
            return redirect()->route('outcome')->with('success', 'Data Berhasil Ditambahkan');
        }
    
        public function edit($id){
    
            $data = outcome::find($id);
            return view('outcome.formedit', compact('data'));
        }
    
        public function update(Request $request, $id){
            $data = outcome::find($id);
            $data->update($request->all());
            return redirect()->route('outcome')->with('success', 'Data Berhasil Diedit');
        }
    
        public function destroy($id){
            $data = outcome::find($id);
            $data->delete();
            return redirect()->route('outcome')->with('success', 'Data Berhasil Didelete');
        }
}
