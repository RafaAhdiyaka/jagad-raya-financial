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
}
