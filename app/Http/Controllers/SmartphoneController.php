<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartphoneController extends Controller
{
    public function index(){
        return view('restrito.smartphones');
    }
}
