<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $id = Auth::id();
        $profiles = User::where('id', $id)->get();
        if (Auth::user()->role == 'admin') {
            $todoUser = Todo::get();
        } else {
            $todoUser = Todo::where('user_id', Auth::id())->get();
        }
        $countTodoDone = $todoUser->where('stat', 'Done')->count();
        $countNotDone = $todoUser->where('stat', 'Not Done')->count();
        $countTodo = count($todoUser);
        if ($countTodo != 0) {
            $percentDone = $countTodoDone / $countTodo * 100;
        } else {
            $percentDone = 0;
        }
        if (Auth::user()->role == 'admin') {
            $todoUser = 0;
        }
        // dd($todoUser);

        return view('profile.profile', compact(
            ['profiles'],
            ['todoUser'],
            ['countTodo'],
            ['countTodoDone'],
            ['percentDone'],
            ['countNotDone']
        ));
    }

    public function edit(){
        $id = Auth::id();
        $profiles = User::where('id', $id)->get();
        $todoUser = Todo::where('user_id', Auth::id())->get();
        $countTodoDone = $todoUser->where('stat', 'Done')->count();
        $countNotDone = $todoUser->where('stat', 'Not Done')->count();
        $countTodo = count($todoUser);
        if ($countTodo != 0) {
            $percentDone = $countTodoDone / $countTodo * 100;
        } else {
            $percentDone = 0;
        }
        if (Auth::user()->role == 'admin') {
            $todoUser = 0;
        }
        // dd($todoUser);

        return view('profile.edit', compact(
            ['profiles'],
            ['todoUser'],
            ['countTodo'],
            ['countTodoDone'],
            ['percentDone'],
            ['countNotDone']
        ));
    }
    public function update(Request $request){
        $id = Auth::user()->id;
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ... validasi lainnya
        ]);

        $user = User::findOrFail($id);

        // Hapus gambar lama jika ada
        if ($request->hasFile('image')) {
            if ($user->image && Storage::exists(str_replace('/storage', 'public', $user->image))) {
                Storage::delete(str_replace('/storage', 'public', $user->image));
            }
        }

        // Tambahkan gambar baru
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $user->image = '/storage/' . $path;
        }

        // Perbarui informasi pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('/profile')->with('success', 'Profile has been successfully updated');
    }

}
