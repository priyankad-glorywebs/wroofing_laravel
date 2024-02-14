<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function index(){
        return view('layouts.front.contractor');
    }
}
