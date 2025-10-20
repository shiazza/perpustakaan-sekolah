<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooklistController extends Controller
{
    public function index () 
    {
        return view('booklist');
    }
}
