<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{


    public function setview(){
        return view('admin.settings.MobileApp.index');
    }

    
}
