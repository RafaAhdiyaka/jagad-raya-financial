<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use PDF;

class CategoryController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = category::where('kategori','LIKE','%' .$request->search.'%')->paginate(15);
        } else{
            $data = category::paginate(15);
        }
    
        return view('category.table', compact('data'));
    }


        public function create(){
            return view('category.add');
        }
    
        public function store(Request $request){
            $this->validate($request, [
                'kategori' => 'required',
            ]);
            category::create($request->all());   
            return redirect()->route('category')->with('success', 'Data Berhasil Ditambahkan');
        }

        public function edit($id){

            $data = category::find($id);
            return view('category.formedit', compact('data'));
        }
    
        public function update(Request $request, $id){
            $data = category::find($id);
            $data->update($request->all());
            return redirect()->route('category')->with('success', 'Data Berhasil Diedit');
        }
    
        public function destroy($id){
            $data = category::find($id);
            $data->delete();
            return redirect()->route('category')->with('success', 'Data Berhasil Didelete');
        }

        public function exportpdf(){
            $data = Category::all();

           view()->share('data', $data);
           $pdf = PDF::loadview('category.cpdf');
           return $pdf->download('category.pdf');
            return 'success';
        }
}
