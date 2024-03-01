<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SeederController extends Controller
{
    public function runSeeder(){
        Artisan::call('db:seed --class=DatabaseSeeder');
        return redirect('/settings')->with('success', 'Seeders have been created successfully.');
    }
}
