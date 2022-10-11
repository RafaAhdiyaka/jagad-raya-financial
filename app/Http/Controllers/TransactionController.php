<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){

        $data = transaction::all();
        return view('transaction.table', compact('data'));
    }
    
}
