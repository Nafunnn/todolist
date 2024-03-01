@extends('templates.master')

@section('body')
<h1 class="my-6 text-2xl font-semibold dark:text-slate-400">Edit To Do</h1>
    @foreach ($todos as $todo)
    <form action="/edit/{{ $todo->id }}/store" method="POST">
        @method('put')
        @csrf
        <div class="grid sm:grid-cols-3 gap-8">
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
                <select class="select select-bordered rounded-sm dark:bg-neutral dark:text-slate-400 w-full max-w-xs" name="priority_id" id="">
                    <option @if ($todo->priority_id == '1')
                        selected
                    @endif value="1">Low</option>
                    <option @if ($todo->priority_id == '2')
                        selected
                    @endif value="2">Medium</option>
                    <option @if ($todo->priority_id == '3')
                        selected
                    @endif value="3">High</option>
                </select>
            </div>
            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Due Date</h1>
                <input value="{{ $todo->due_date }}" name="due_date" type="date" placeholder="Type here" class="input input-bordered rounded-sm dark:bg-neutral dark:border-slate-400 dark:text-slate-400 w-full max-w-xs" />
            </div>
            <div>
                <h1 class="dark:text-slate-400 font-semibold mb-4">Status</h1>
                <select class="select select-bordered rounded-sm dark:bg-neutral dark:text-slate-400 w-full max-w-xs" name="status_id" id="">
                    <option @if ($todo->status_id == '1')
                        selected
                    @endif value="1">Not Done</option>
                    <option @if ($todo->status_id == '2')
                        selected
                    @endif value="2">To Do</option>
                    <option @if ($todo->status_id == '3')
                        selected
                    @endif value="3">Need Review</option>
                    @if (Auth::user()->role == 'admin')
                    <option @if ($todo->status_id == '4')
                        selected
                    @endif value="4">Done</option>
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
