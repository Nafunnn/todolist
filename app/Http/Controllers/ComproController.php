<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComproController extends Controller
{
    public function index(){
        return view ('compro.compro');
    }
}
