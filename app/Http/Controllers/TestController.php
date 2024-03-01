<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('test.test');
    }
    public function index1(){
        return view('test.test1');
    }
    public function index2(){
        return view('test.test2');
    }
}
