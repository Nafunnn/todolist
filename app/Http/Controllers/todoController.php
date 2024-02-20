<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Todo;
use App\Models\User;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class todoController extends Controller
{
    public function home()
    {
        $todos = Todo::where('user_id', Auth::id())->orderBy('creation_date', 'desc')->get();

        // Check if the user is an admin
        if (Auth::user()->role == 'admin') {
            $todosAdmin = Todo::with('user')->orderBy('creation_date', 'desc')->get();
            $data = ['todosAdmin' => $todosAdmin];
        } else {
            $data = ['todos' => $todos];
        }

        return view('home.home', $data);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $user = Auth::user();

        // Cari todo berdasarkan query yang dimasukkan
        if ($user->role == 'user') {
            $todos = Todo::where('user_id', $user->id)
                    ->where(function ($q) use ($query) {
                        $q->where('title', 'LIKE', "%$query%")
                        ->orWhere('desc', 'LIKE', "%$query%");
                    })
                    ->get();
            $data = ['todos' => $todos, 'query' => $query];

        } elseif ($user->role == 'admin') {
            $todosAdmin = Todo::with('user')
                            ->where(function ($q) use ($query) {
                                $q->where('title', 'LIKE', "%$query%")
                                ->orWhere('desc', 'LIKE', "%$query%");
                            })
                            ->get();

            $data = ['todosAdmin' => $todosAdmin, 'query' => $query];
        }

        // Periksa apakah tidak ada hasil pencarian
        if (empty($todos) && empty($todosAdmin)) {
            $data['message'] = 'Data tidak ditemukan';
        }
        // dd($data);
        return view('search.search', $data);
    }




    public function details($id){
        $todos = DB::table('todos')->where('id', $id)->get();

        if (Auth::user()->role == 'admin') {
            $todosAdmin = Todo::where('id', $id)->with('user')->get();
            $data = ['todosAdmin' => $todosAdmin];
        } else {
            $data = ['todos' => $todos];
        }
        // dd($data);
        return view('home.details', $data);
    }
    public function dashboard(){
        if (Auth::user()->role == 'admin') {
            $todos = Todo::get();
            $users = User::where('role', 'user')->get();
            $user = User::where('role', 'user')->get();
            $totalTodo = $todos->count();
            $priorityLow = $todos->where('priority', 'Low')->count();
            $priorityMed = $todos->where('priority', 'Medium')->count();
            $priorityHigh = $todos->where('priority', 'High')->count();
            $statNotDone = $todos->where('stat', 'Not Done')->count();
            $statNeedReview = $todos->where('stat', 'Need Review')->count();
            $statToDo = $todos->where('stat', 'To Do')->count();
            $statDone = $todos->where('stat', 'Done')->count();
            $statUser = $user->count();

            $totalNotDone = $statToDo + $statNotDone;
            if ($totalTodo != 0) {
                $percentDone = $statDone / $totalTodo * 100;
            } else{
                $percentDone = 0;
            }
        } elseif (Auth::user()->role == 'user') {
            $user = Auth::user();
            $users = 0;
            $todos = Todo::where('user_id', $user->id)->get();
            $totalTodo = $todos->count();
            $priorityLow = $todos->where('priority', 'Low')->count();
            $priorityMed = $todos->where('priority', 'Medium')->count();
            $priorityHigh = $todos->where('priority', 'High')->count();
            $statNotDone = $todos->where('stat', 'Not Done')->count();
            $statToDo = $todos->where('stat', 'To Do')->count();
            $statNeedReview = $todos->where('stat', 'Need Review')->count();
            $statDone = $todos->where('stat', 'Done')->count();
            $statUser = $user;

            $totalNotDone = $statToDo + $statNotDone;
            if ($totalTodo != 0) {
                $percentDone = $statDone / $totalTodo * 100;
            } else{
                $percentDone = 0;
            }
        }

        // dd($todos);
        return view('dashboard.dashboard', compact(
            ['totalTodo'],
            ['totalNotDone'],
            ['priorityLow'],
            ['priorityMed'],
            ['priorityHigh'],
            ['statNotDone'],
            ['statToDo'],
            ['statDone'],
            ['statNeedReview'],
            ['percentDone'],
            ['statUser'],
            ['users']
        ));
    }

    public function create(){
        return view ('create.create');
    }

    public function store(Request $request)
{
    // $todoId = DB::table('todos')->insert([
    //     'title' => $request->title,
    //     'desc' => $request->desc,
    //     'due_date' => $request->due_date,
    //     'priority' => $request->priority,
    //     'stat' => $request->stat,
    //     // 'creation_date' => Carbon::now(),
    //     'user_id' => auth()->user()->id,
    // ]);
    $todo = Todo::create([
        'title' => $request->title,
        'desc' => $request->desc,
        'due_date' => $request->due_date,
        'priority' => $request->priority,
        'stat' => $request->stat,
        'type' => 'create',
        'creation_date' => Carbon::now(),
        'user_id' => auth()->user()->id,
    ]);

    History::create([
        'title' => $todo->title,
        'type' => 'create',
        'user_id' => auth()->user()->id,
        'todo_id' => $todo->id, // Use the retrieved todoId here
        'body' => 'User ' . auth()->user()->name . ' created a new To Do: ' . $todo->title.' on '. $todo->creation_date,
    ]);

    // DB::table('history')->insert([
    //     'title' => $request->title,
    //     'user_id' => auth()->user()->id,
    //     'todo_id' => $todoId->id, // Use the retrieved todoId here
    //     'body' => 'User ' . auth()->user()->name . ' created a new To Do: ' . $request->title.' on '.$todoId->creation_date,
    // ]);

        return redirect('/home')->with('status', 'New todo created successfully');

    }
    public function edit($id){
        $todos = DB::table('todos')->where('id', $id)->get();
        // dd($todos);
        return view('edit.edit', compact(['todos']));
    }

    public function update($id, Request $request){
        $todo = Todo::find($id);
        $timeNow = Carbon::now();

        History::create([
        'title' => $todo->title,
        'type' => 'edit',
        'user_id' => auth()->user()->id,
        'todo_id' => $todo->id, // Use the retrieved todoId here
        'body' => 'User ' . auth()->user()->name . ' updated To Do: ' . $todo->title.' on '. $timeNow,
        ]);
        // $todos = DB::table('todos')->find($id);
        DB::table('todos')->where('id', $id)->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'due_date'=>$request->due_date,
            'priority'=>$request->priority,
            'stat'=>$request->stat,
            'user_id'=>auth()->user()->id,
        ]);
        return redirect('/home')->with('status', 'Todo edited successfully');
    }

    public function delete($id){
        $todo = Todo::find($id);
        $timeNow = Carbon::now();

        History::create([
        'title' => $todo->title,
        'type' => 'move_delete',
        'user_id' => auth()->user()->id,
        'todo_id' => $todo->id, // Use the retrieved todoId here
        'body' => 'User ' . auth()->user()->name . ' moved To Do: ' . $todo->title.' to trash on '. $timeNow,
        ]);

        Todo::where('id', $id)->delete();
        // dd($d);
        return redirect('/home')->with('status', 'Todo successfully moved to trash');
    }

    public function trash() {
        $todos = Todo::onlyTrashed()->where('user_id', Auth::id())->get();

        // Check if the user is an admin
        if (Auth::user()->role == 'admin') {
            $todosAdmin = Todo::with('user')->onlyTrashed()->get();
            $data = ['todosAdmin' => $todosAdmin];
        } else {
            $data = ['todos' => $todos];
        }
        // dd($data);

        return view('trash.trash', $data);
    }


    public function restore($id){
        $todo = Todo::withTrashed()->find($id);
        $timeNow = Carbon::now();
        $restoredData = Todo::withTrashed()->findOrFail($id);
        $restoredData->restore();

        History::create([
            'title' => $todo->title,
            'type' => 'restore',
            'user_id' => auth()->user()->id,
            'todo_id' => $todo->id, // Use the retrieved todoId here
            'body' => 'User ' . auth()->user()->name . ' restored To Do: ' . $todo->title.' from trash on '. $timeNow,
            ]);

        return redirect('/trash')->with('status', 'Todo has been successfully restored');
    }

    public function forceDelete($id){
        $todo = Todo::where('id', $id)->withTrashed()->get();
        // dd($todo);
        $timeNow = Carbon::now();
        History::create([
            'title' => $todo[0]->title,
            'type' => 'delete',
            'user_id' => auth()->user()->id,
            'todo_id' => $todo[0]->id, // Use the retrieved todoId here
            'body' => 'User ' . auth()->user()->name . ' deleted To Do: ' . $todo[0]->title.' from trash on '. $timeNow,
            ]);
        $deletedData = Todo::withTrashed()->findOrFail($id);
        $deletedData->forceDelete();

        return redirect('/trash')->with('status', 'Todo has been deleted successfully');

    }
    public function submit($id){
        $todo = Todo::findOrFail($id);
        $todo->update([
            'stat' => 'Done'
        ]);

        return redirect('/details/'.$id)->with('status', 'This todo has been successfully validated to be done.');
    }
}
