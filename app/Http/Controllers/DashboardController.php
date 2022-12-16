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
        if(auth()->guest()){
            abort(403);
        }
        return view('layouts.dashboard');
    }
}
