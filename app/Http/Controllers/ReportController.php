<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;

class ReportController extends Controller
{
    public function report(){
        $user = User::all();
        $transaction = Transaction::all();
        return view('report.report',[
            'user' => $user,
            'transaction' => $transaction
        ]);
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
