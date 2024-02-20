@extends('templates.master')

@section('body')

<h1 class="my-6 text-2xl font-semibold dark:text-slate-400">Your To Do Statistic</h1>
@if (session('status'))
        <div class="toast toast-top toast-end">
            <div class="alert alert-success text-white">
                <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.49991 0.877045C3.84222 0.877045 0.877075 3.84219 0.877075 7.49988C0.877075 11.1575 3.84222 14.1227 7.49991 14.1227C11.1576 14.1227 14.1227 11.1575 14.1227 7.49988C14.1227 3.84219 11.1576 0.877045 7.49991 0.877045ZM1.82708 7.49988C1.82708 4.36686 4.36689 1.82704 7.49991 1.82704C10.6329 1.82704 13.1727 4.36686 13.1727 7.49988C13.1727 10.6329 10.6329 13.1727 7.49991 13.1727C4.36689 13.1727 1.82708 10.6329 1.82708 7.49988ZM10.1589 5.53774C10.3178 5.31191 10.2636 5.00001 10.0378 4.84109C9.81194 4.68217 9.50004 4.73642 9.34112 4.96225L6.51977 8.97154L5.35681 7.78706C5.16334 7.59002 4.84677 7.58711 4.64973 7.78058C4.45268 7.97404 4.44978 8.29061 4.64325 8.48765L6.22658 10.1003C6.33054 10.2062 6.47617 10.2604 6.62407 10.2483C6.77197 10.2363 6.90686 10.1591 6.99226 10.0377L10.1589 5.53774Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                <h1 class="text-white">{{ session('status') }}</h1>
            </div>
        </div>
        @endif
<div class="flex justify-center">
    <div class="stats shadow dark:bg-slate-700 dark:text-slate-200">

        <div class="stat">
          <div class="stat-title dark:text-slate-400">Total ToDo</div>
          <div class="stat-value text-primary">{{ $totalTodo }} Task</div>
        </div>

        <div class="stat">
          <div class="stat-title dark:text-slate-400">Total Done</div>
          <div class="stat-value text-secondary">{{ $statDone }} Task</div>
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
          <div class="stat-desc text-secondary">{{ $totalNotDone }} tasks remaining</div>
        </div>

      </div>
</div>

    {{-- @foreach ($priorityLow as $pLow) --}}
 <h1 class="text-xl font-semibold dark:text-slate-400 opacity-75 pt-4">Priority</h1>
    <div class="dark:text-slate-400 grid grid-cols-3 my-2 gap-6">
        <div class="flex gap-4 rounded-lg bg-slate-50 dark:bg-slate-700 shadow-md">
            <div class="w-2 m-2 bg-info rounded-lg"></div>
            <div class="my-2">
                <h1 class="font-semibold text-xl">{{ $priorityLow}}</h1>
                <h3 class="opacity-50 -mt-1">Priority Low</h3>
            </div>
        </div>

        <div class="flex gap-4 rounded-lg bg-slate50 dark:bg-slate-700 shadow-md">
            <div class="w-2 m-2 bg-warning rounded-lg"></div>
            <div class="my-2">
                <h1 class="font-semibold text-xl">{{ $priorityMed}}</h1>
                <h3 class="opacity-50 -mt-1">Priority Medium</h3>
            </div>
        </div>

        <div class="flex gap-4 rounded-lg bg-slate50 dark:bg-slate-700 shadow-md">
            <div class="w-2 m-2 bg-error rounded-lg"></div>
            <div class="my-2">
                <h1 class="font-semibold text-xl">{{ $priorityHigh}}</h1>
                <h3 class="opacity-50 -mt-1">Priority High</h3>
            </div>
        </div>
    </div>

    <h1 class="text-xl font-semibold dark:text-slate-400 opacity-75 pt-4">Status</h1>

    <div class="dark:text-slate-400 grid grid-cols-4 gap-6">

        <div class="flex gap-4 rounded-lg bg-slate50 dark:bg-slate-700 shadow-md">
            <div class="w-2 m-2 bg-error rounded-lg"></div>
            <div class="my-2">
                <h1 class="font-semibold text-xl">{{ $statNotDone}}</h1>
                <h3 class="opacity-50 -mt-1">Status Not Done</h3>
            </div>
        </div>

        <div class="flex gap-4 rounded-lg bg-slate50 dark:bg-slate-700 shadow-md">
            <div class="w-2 m-2 bg-warning rounded-lg"></div>
            <div class="my-2">
                <h1 class="font-semibold text-xl">{{ $statToDo}}</h1>
                <h3 class="opacity-50 -mt-1">Status To Do</h3>
            </div>
        </div>

        <div class="flex gap-4 rounded-lg bg-slate50 dark:bg-slate-700 shadow-md">
            <div class="w-2 m-2 bg-slate-400 rounded-lg"></div>
            <div class="my-2">
                <h1 class="font-semibold text-xl">{{ $statNeedReview}}</h1>
                <h3 class="opacity-50 -mt-1">Status Need Review</h3>
            </div>
        </div>

        <div class="flex gap-4 rounded-lg bg-slate50 dark:bg-slate-700 shadow-md">
            <div class="w-2 m-2 bg-success rounded-lg"></div>
            <div class="my-2">
                <h1 class="font-semibold text-xl">{{ $statDone}}</h1>
                <h3 class="opacity-50 -mt-1">Status Done</h3>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
    @if (Auth::user()->role == 'admin')
    <h1 class="text-xl font-semibold dark:text-slate-400 opacity-75 pt-4">User</h1>
        <div class="rounded-lg bg-slate-50 dark:bg-slate-700 shadow-md dark:text-slate-400">
            <div class="flex gap-4 ">
                <div class="w-2 m-2 bg-success rounded-lg"></div>
                <div class="my-2">
                    <h1 class="font-semibold text-xl">{{ $statUser}}</h1>
                    <h3 class="opacity-50 -mt-1">Total User</h3>
                </div>
            </div>
                <div class="overflow-x-auto ">
                    <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>

                        <th class="dark:text-slate-400">Username</th>
                        <th class="dark:text-slate-400">Email</th>
                        <th class="dark:text-slate-400">Created At</th>
                        <th class="dark:text-slate-400">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <!-- row 1 -->
                        <tr>

                            <td>
                                <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                    <img src="{{ asset($user->image) }}" alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold dark:text-slate-400">{{ $user->name }}</div>
                                </div>
                                </div>
                            </td>
                            <td class="dark:text-slate-400">
                                {{ $user->email }}
                            </td>
                            <td class="dark:text-slate-400">{{ $user->created_at }}</td>
                            <th>
                                <a class="btn btn-sm" href="/user/{{ $user->id }}/detail"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.49991 0.876892C3.84222 0.876892 0.877075 3.84204 0.877075 7.49972C0.877075 11.1574 3.84222 14.1226 7.49991 14.1226C11.1576 14.1226 14.1227 11.1574 14.1227 7.49972C14.1227 3.84204 11.1576 0.876892 7.49991 0.876892ZM1.82707 7.49972C1.82707 4.36671 4.36689 1.82689 7.49991 1.82689C10.6329 1.82689 13.1727 4.36671 13.1727 7.49972C13.1727 10.6327 10.6329 13.1726 7.49991 13.1726C4.36689 13.1726 1.82707 10.6327 1.82707 7.49972ZM8.24992 4.49999C8.24992 4.9142 7.91413 5.24999 7.49992 5.24999C7.08571 5.24999 6.74992 4.9142 6.74992 4.49999C6.74992 4.08577 7.08571 3.74999 7.49992 3.74999C7.91413 3.74999 8.24992 4.08577 8.24992 4.49999ZM6.00003 5.99999H6.50003H7.50003C7.77618 5.99999 8.00003 6.22384 8.00003 6.49999V9.99999H8.50003H9.00003V11H8.50003H7.50003H6.50003H6.00003V9.99999H6.50003H7.00003V6.99999H6.50003H6.00003V5.99999Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg></a>

                                <!-- The button to open modal -->
                            <label for="my_modal_6" class="btn btn-error btn-sm text-white"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 1C5.22386 1 5 1.22386 5 1.5C5 1.77614 5.22386 2 5.5 2H9.5C9.77614 2 10 1.77614 10 1.5C10 1.22386 9.77614 1 9.5 1H5.5ZM3 3.5C3 3.22386 3.22386 3 3.5 3H5H10H11.5C11.7761 3 12 3.22386 12 3.5C12 3.77614 11.7761 4 11.5 4H11V12C11 12.5523 10.5523 13 10 13H5C4.44772 13 4 12.5523 4 12V4L3.5 4C3.22386 4 3 3.77614 3 3.5ZM5 4H10V12H5V4Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg></label>

                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                            <div class="modal" role="dialog">
                            <div class="modal-box dark:bg-slate-700">
                                <h3 class="font-bold text-lg dark:text-slate-200">Are you sure?</h3>
                                <p class="py-4 font-normal">Are you sure you want to move this user and user's todo to the trash? You can restore it back from the trash page!</p>
                                <div class="modal-action flex gap-4">
                                    <a class="btn btn-error text-white" href="/user/{{ $user->id }}/delete">Move to Trash</a>
                                    <label for="my_modal_6" class="btn">Close!</label>
                                </div>
                            </div>
                            </div>
                            </th>
                            </tr>
                        @endforeach


                    </tbody>
                    </table>
                </div>
        </div>
    @endif
@endsection
