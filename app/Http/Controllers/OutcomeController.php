<?php

namespace App\Http\Controllers;

use App\Models\outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{

    public function index(Request $request){
        if($request->has('search')){
            $data = outcome::where('keterangan','LIKE','%' .$request->search.'%')->paginate(15);
        } else{
            $data = outcome::paginate(15);
        }
    
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

        public function filter(Request $request){
            $date = $request->get('sampai');
            $data = outcome::where('tanggal', 'like', '%' . $date . '%')
            ->paginate(10);
            return view('transaction.table', compact('data'));
        }
}
