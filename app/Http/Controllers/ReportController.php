<?php

namespace App\Http\Controllers;

use App\Models\User;
use PDF;
use App\Models\Transaction;
use App\Models\Income;
use App\Models\Outcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function report(){
        $user = User::all();
        $transaction = Transaction::all();
        return view('report.report',[
            'user' => $user,
            'transaction' => $transaction,
            
        ]);
    }

    public function create(){
        return view('transaction.add',[
            'transaksi' => Transaction::all(),
        ]);
    }

    public function filter(Request $request){
        if (request()->dari || request()->sampai) {
            $sampai = explode('-', request('sampai'));
            $sampai = $sampai[0]. '-' . $sampai[1] . '-' . intval($sampai[2]);
            $transaction = transaction::whereBetween('tanggal',[request('dari'), $sampai])->paginate(15);
        } else {
            $transaction = transaction::paginate(15);
        }

        return view('report.report',compact('transaction'));
    }

    public function exportpdf(){
        $transaction = Transaction::all();

       view()->share('transaction', $transaction);
       $pdf = PDF::loadview('report.tpdf');
       return $pdf->download('report.pdf');
        return 'success';
    }



    // public function store(Request $request){
    //     $validasi = $this->validate($request,[
    //         'tanggal' => ['required'],
    //         'keterangan' => ['required'],
    //         'income_id' => ['required'],
    //         'outcome_id' => ['required'],
    //     ]);

        // $kamar = Kamar::where('id',$request->kamar_id)->first();

        // $validasi['total_payment'] = $request->qty * $kamar->harga;
        // $validasi['booking_code'] = $this->GenerateCode();

        // Booking::create($validasi);
    //     return redirect('/report')->with('success','Data berhasil di tambah!');
    // }

    // public function invoice(){
    //     $user = User::all();
    //     $transaction = Transaction::all();
    //     return view('report.report',[
    //         'user' => $user,
    //         'transaction' => $transaction,
    //     ]);
    

    // public function print(){
    //     $booking = Booking::where('user_id',auth()->user()->id)->get();
    //     $user = User::all();
    //     $kamar = Kamar::all();
    //     return view('invoice.invoice-print',[
    //         'booking' => $booking,
    //         'user' => $user,
    //         'kamar' => $kamar,
    //     ]);
    // }
    
}
