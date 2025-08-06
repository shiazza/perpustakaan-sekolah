<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function index2()
    {
        return view('login');
    }

    public function index3()
    {
        return view('landing_page');
    }
}
