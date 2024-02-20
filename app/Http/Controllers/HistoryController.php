<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index(){
        $histories = History::orderBy('created_at', 'desc')->get();
        // $historiesUser= DB::table('user')->where('user_id', $id)->get();
        // $test = $histories + $historiesUser;
        // dd($histories);

        return view('history.history', compact(['histories']));
    }
}
