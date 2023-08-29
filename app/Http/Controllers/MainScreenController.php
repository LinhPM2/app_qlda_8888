<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainScreenController extends Controller
{
    //
    public function index(){
        return redirect()->to(route('dealer'));
    }
}
