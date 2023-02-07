<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function view(){
        //dd('1');
        return view('admin.brand.index');
    }
}
