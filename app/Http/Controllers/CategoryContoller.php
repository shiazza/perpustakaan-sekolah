<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryContoller extends Controller
{
    public function index(){
        return view ('category.index');
    }
}
