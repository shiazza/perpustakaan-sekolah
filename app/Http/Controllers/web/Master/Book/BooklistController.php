<?php

namespace App\Http\Controllers\web\Master\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooklistController extends Controller
{
    public function index () 
    {
        return view('booklist');
    }
}
