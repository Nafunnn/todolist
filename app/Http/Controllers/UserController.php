<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index($id){
        $userDetail = User::where('id', $id)->get();
        $todoUser = Todo::where('user_id', $id)->get();
        $countTodo = count($todoUser);

        return view('dashboard.userDetail', compact(
            ['userDetail'],
            ['todoUser'],
            ['countTodo']
        ));
    }

    public function delete($id){
        $user = User::find($id);
        $todo = Todo::where('user_id', $id)->get();
        $timeNow = Carbon::now();

        History::create([
        'title' => $user->name,
        'type' => 'move_delete',
        'user_id' => auth()->user()->id,
        'user_id_delete' => $user->id,
        'body' => 'User ' . auth()->user()->name . ' moved User: ' . $user->name.' to trash on '. $timeNow,
        ]);
        // dd($user);

        Todo::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
        return redirect('/dashboard')->with('status', "User and user's ToDo successfully moved to trash");
    }
    public function trash(){
        $trashedData = User::onlyTrashed()->get();

        // dd($trashedData);
        return view('trash.user', ['trashedDatas' => $trashedData]);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $todo = Todo::withTrashed()->where('user_id', $id);
        $timeNow = Carbon::now();
        $restoredData = User::withTrashed()->findOrFail($id);
        $restoredTodo = $todo;
        $restoredData->restore();
        $restoredTodo->restore();

        History::create([
            'title' => $user->name,
            'type' => 'restore',
            'user_id' => auth()->user()->id,
            'user_id_deleted' => $user->id,
            'body' => 'User ' . auth()->user()->name . ' restored User : ' . $user->name.' from trash on '. $timeNow,
            ]);

        return redirect('/trash/user')->with('status', "User and user's ToDo has been successfully restored");
    }
    public function forceDelete($id){
        // Mengambil data user yang akan dihapus bersama dengan data terhapus (soft deleted)
        $user = User::withTrashed()->find($id);
        // Mengambil data todo yang akan dihapus
        $todos = Todo::where('user_id', $id)->get();
        $timeNow = Carbon::now();

        // Menghapus todos
        $todos->each->forceDelete(); // Menggunakan each untuk memanggil forceDelete pada setiap todo

        // Menghapus user secara permanen
        $user->forceDelete();

        // Menyimpan riwayat penghapusan user
        History::create([
            'title' => $user->name,
            'type' => 'delete',
            'user_id' => auth()->user()->id,
            'user_id_delete' => $user->id,
            'body' => 'User ' . auth()->user()->name . ' deleted User : ' . $user->name." and user's To Do from trash on ". $timeNow,
        ]);

        return redirect('/trash')->with('status', "User and user's todo has been deleted successfully");
    }

    public function resetView(){

        return view('auth.reset');
    }

    // UserController.php

public function storeReset(Request $request){
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed', // Konfirmasi password di sini
    ]);

    // Cari akun pengguna berdasarkan alamat email yang diberikan
    $user = User::where('email', $request->email)->first();

    // Jika akun ditemukan, atur ulang passwordnya
    if ($user) {
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect ke halaman login atau halaman lain yang sesuai
        return redirect('/login')->with('success', 'The password has been changed successfully');
    }

    // Jika akun tidak ditemukan, kembalikan ke halaman reset dengan pesan kesalahan
    return redirect('forgot/password')->with('error', 'Email address not found');
}


}
