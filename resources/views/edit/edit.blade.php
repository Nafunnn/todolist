@extends('templates.master')

@section('body')
<h1 class="my-6 text-2xl font-semibold dark:text-slate-400">Edit To Do</h1>
    @foreach ($todos as $todo)
    <form action="/edit/{{ $todo->id }}/store" method="POST">
        @method('put')
        @csrf
        <div class="grid grid-cols-3 gap-8">
            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Title</h1>
                <input value="{{ $todo->title }}" name="title" type="text" placeholder="Type here" class="input input-bordered rounded-sm dark:bg-neutral dark:border-slate-400 dark:text-slate-400 w-full max-w-xs" />
            </div>
            <div class="row-span-2">
                <h1 class="dark:text-slate-400 font-semibold mb-4">Description</h1>
                <textarea class="input input-bordered rounded-sm dark:bg-neutral dark:border-slate-400 dark:text-slate-400 h-4/5 w-full max-w-xs" name="desc" id="" placeholder="Type description here">{{ $todo->desc }}</textarea>
            </div>

            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Priority</h1>
                <select class="select select-bordered rounded-sm dark:bg-neutral dark:text-slate-400 w-full max-w-xs" name="priority" id="">
                    <option @if ($todo->priority == 'Low')
                        selected
                    @endif value="Low">Low</option>
                    <option @if ($todo->priority == 'Medium')
                        selected
                    @endif value="Medium">Medium</option>
                    <option @if ($todo->priority == 'High')
                        selected
                    @endif value="High">High</option>
                </select>
            </div>
            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Due Date</h1>
                <input value="{{ $todo->due_date }}" name="due_date" type="date" placeholder="Type here" class="input input-bordered rounded-sm dark:bg-neutral dark:border-slate-400 dark:text-slate-400 w-full max-w-xs" />
            </div>
            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Status</h1>
                <select class="select select-bordered rounded-sm dark:bg-neutral dark:text-slate-400 w-full max-w-xs" name="stat" id="">
                    <option @if ($todo->stat == 'Not Done')
                        selected
                    @endif value="Not Done">Not Done</option>
                    <option @if ($todo->stat == 'To Do')
                        selected
                    @endif value="To Do">To Do</option>
                    <option @if ($todo->stat == 'Need Review')
                        selected
                    @endif value="Need Review">Need Review</option>
                    @if (Auth::user()->role == 'admin')
                    <option @if ($todo->stat == 'Done')
                        selected
                    @endif value="Done">Done</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="flex gap-4 mt-8">
            <input class="btn border-slate-300 dark:btn-neutral dark:border-none" type="submit" value="Update">
            <a class="btn btn-outline btn-error" href="/home">Cancel</a>
        </div>
    </form>
    @endforeach
@endsection
