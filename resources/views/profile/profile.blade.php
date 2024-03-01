@extends('templates.master')

@section('body')
<div class="">
    <h1 class="my-6 text-2xl font-semibold dark:text-slate-400">Your Profile</h1>
    @if (session('success'))
    <div class="toast toast-top toast-end">
        <div class="alert alert-success text-white">
            <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.49991 0.877045C3.84222 0.877045 0.877075 3.84219 0.877075 7.49988C0.877075 11.1575 3.84222 14.1227 7.49991 14.1227C11.1576 14.1227 14.1227 11.1575 14.1227 7.49988C14.1227 3.84219 11.1576 0.877045 7.49991 0.877045ZM1.82708 7.49988C1.82708 4.36686 4.36689 1.82704 7.49991 1.82704C10.6329 1.82704 13.1727 4.36686 13.1727 7.49988C13.1727 10.6329 10.6329 13.1727 7.49991 13.1727C4.36689 13.1727 1.82708 10.6329 1.82708 7.49988ZM10.1589 5.53774C10.3178 5.31191 10.2636 5.00001 10.0378 4.84109C9.81194 4.68217 9.50004 4.73642 9.34112 4.96225L6.51977 8.97154L5.35681 7.78706C5.16334 7.59002 4.84677 7.58711 4.64973 7.78058C4.45268 7.97404 4.44978 8.29061 4.64325 8.48765L6.22658 10.1003C6.33054 10.2062 6.47617 10.2604 6.62407 10.2483C6.77197 10.2363 6.90686 10.1591 6.99226 10.0377L10.1589 5.53774Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            <h1 class="text-white">{{ session('success') }}</h1>
        </div>
    </div>
    @endif
    <div class="grid sm:grid-cols-2  gap-6 ">
        <div class="">
            @foreach ($profiles as $profile)
            <div class="flex justify-center" >
                <div class="shadow-lg rounded-full w-64">
                    <img class="rounded-full" src="{{ asset(auth()->user()->image) }}" alt="Profile Picture">
                </div>
            </div>
            <div class="flex justify-center my-2 opacity-0">
                <input disabled type="file" name="image" class=" file-input dark:border-slate-400 dark:bg-slate-600 dark:text-white file-input-bordered w-full max-w-xs" />
            </div>
            <div class="mb-4">
                <h1 class="font-semibold mb-1 dark:text-slate-400">Username</h1>
                <input class="input input-bordered w-full dark:bg-slate-600 dark:text-white" readonly type="text" value="{{ $profile->name }}">
            </div>
            <div class="mb-4">
                <h1 class="font-semibold mb-1 dark:text-slate-400">Email</h1>
                <input class="input input-bordered w-full dark:bg-slate-600 dark:text-white" readonly type="text" value="{{ $profile->email }}">
            </div>
            <div class="mb-4">
                <h1 class="font-semibold mb-1 dark:text-slate-400">Created At</h1>
                <input class="input input-bordered w-full dark:bg-slate-600 dark:text-white" readonly type="text" value="{{ $profile->created_at }}">
            </div>
            @endforeach
        </div>
        <div class="overflow-x-auto">
            <div class="flex justify-center mb-4">
                <div class="stats shadow dark:bg-slate-700 dark:text-slate-200">

                    <div class="stat">
                      <div class="stat-title dark:text-slate-400">Total ToDo</div>
                      <div class="stat-value text-primary">{{ $countTodo }} Task</div>
                    </div>

                    <div class="stat">
                      <div class="stat-title dark:text-slate-400">Total Done</div>
                      <div class="stat-value text-secondary">{{ $countTodoDone }} Task</div>
                    </div>

                    <div class="stat">
                      <div class="stat-figure text-secondary">
                        <div class="avatar online">
                          <div class="rounded-full">
                            <svg width="50" height="50" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.49991 0.877045C3.84222 0.877045 0.877075 3.84219 0.877075 7.49988C0.877075 11.1575 3.84222 14.1227 7.49991 14.1227C11.1576 14.1227 14.1227 11.1575 14.1227 7.49988C14.1227 3.84219 11.1576 0.877045 7.49991 0.877045ZM1.82708 7.49988C1.82708 4.36686 4.36689 1.82704 7.49991 1.82704C10.6329 1.82704 13.1727 4.36686 13.1727 7.49988C13.1727 10.6329 10.6329 13.1727 7.49991 13.1727C4.36689 13.1727 1.82708 10.6329 1.82708 7.49988ZM10.1589 5.53774C10.3178 5.31191 10.2636 5.00001 10.0378 4.84109C9.81194 4.68217 9.50004 4.73642 9.34112 4.96225L6.51977 8.97154L5.35681 7.78706C5.16334 7.59002 4.84677 7.58711 4.64973 7.78058C4.45268 7.97404 4.44978 8.29061 4.64325 8.48765L6.22658 10.1003C6.33054 10.2062 6.47617 10.2604 6.62407 10.2483C6.77197 10.2363 6.90686 10.1591 6.99226 10.0377L10.1589 5.53774Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                          </div>
                        </div>
                      </div>
                      <div class="stat-value">{{ \Illuminate\Support\Str::limit($percentDone, 4, $end='') }}%</div>
                      <div class="stat-title dark:text-slate-400">Tasks done</div>
                      <div class="stat-desc text-secondary">{{ $countNotDone }} tasks remaining</div>
                    </div>

                  </div>
            </div>

            <div class="mb-4">
                @if (Auth::user()->role == 'user')
                <h1 class="font-semibold mb-1 dark:text-slate-400">Todo</h1>
                <div class="overflow-x-auto shadow-md rounded-sm">
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
                                <td>{{ $todo->priority->priority }}</td>
                                <td>{{ $todo->status->status }}</td>
                            </tr>
                            @php
                                $i++
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="flex justify-end mb-4">
        <a href="/profile/edit" class="btn btn-outline btn-warning">Edit Profile</a>
    </div>
</div>
@endsection
