<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\income;
use App\Models\outcome;
use App\Models\transaction;

class DashboardController extends Controller
{
    public function index(){

        $totalIncomes = Income::count();
        $totalOutcomes = Outcome::count();
        $totalTransactions = Transaction::count();
        
        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalIncome = Income::count();
        $todayIncome = Income::whereDate('created_at', $todayDate)->count();
        $thisMonthIncome= Income::whereMonth('created_at', $thisMonth)->count();
        $thisYearIncome = Income::whereYear('created_at', $thisYear)->count();

        return view('layouts.dashboard', compact('totalIncomes', 'totalOutcomes', 'totalTransactions', 'totalIncome', 'todayIncome', 'thisMonthIncome', 'thisYearIncome'));
    }
}
