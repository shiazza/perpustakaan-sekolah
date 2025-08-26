<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // It's for dummy test view
    public function index()
    {
        return view('dashboard');
    }

    public function index2()
    {
        return view('login');
    }


}
