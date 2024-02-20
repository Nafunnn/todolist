@extends('templates.master')

@section('body')
<h1 class="my-6 text-2xl font-semibold dark:text-slate-400">User Details</h1>

<div class="grid grid-cols-2 gap-6">
    <div>
        @foreach ($userDetail as $detail)
        <div class="flex justify-center">
            <img class="rounded-full" width="256px" src="{{ asset($detail->image) }}" alt="">
        </div>
        <div class="mb-4">
            <h1 class="font-semibold mb-1 dark:text-slate-400">Username</h1>
            <input class="input input-bordered w-full dark:bg-slate-600 dark:text-white" readonly type="text" value="{{ $detail->name }}">
        </div>
        <div class="mb-4">
            <h1 class="font-semibold mb-1 dark:text-slate-400">Email</h1>
            <input class="input input-bordered w-full dark:bg-slate-600 dark:text-white" readonly type="text" value="{{ $detail->email }}">
        </div>
        <div class="mb-4">
            <h1 class="font-semibold mb-1 dark:text-slate-400">Created At</h1>
            <input class="input input-bordered w-full dark:bg-slate-600 dark:text-white" readonly type="text" value="{{ $detail->created_at }}">
        </div>
        @endforeach
    </div>
    <div>
        <div class="mb-4">
            <h1 class="font-semibold mb-1 dark:text-slate-400">Total Todo</h1>
            <input class="input input-bordered dark:bg-slate-600 dark:text-white" readonly type="number" name="" value="{{ $countTodo }}" id="">
        </div>
        <div class="mb-4">
            <h1 class="font-semibold mb-1 dark:text-slate-400">Todo</h1>
            <div class="overflow-x-auto">
                <table class="table dark:text-slate-400">
                    <!-- head -->
                    <thead>
                        <tr>
                        <th></th>
                        <th class="dark:text-slate-400">Title</th>
                        <th class="dark:text-slate-400">Priority</th>
                        <th class="dark:text-slate-400">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach ($todoUser as $todo)
                        <!-- row 1 -->
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->priority }}</td>
                            <td>{{ $todo->stat }}</td>
                        </tr>
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
