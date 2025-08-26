<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddbookController extends Controller
{
    public function index () 
    {
        return view('addbook');
    }
}
